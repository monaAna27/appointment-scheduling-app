<?php

namespace core;

class Router {
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $configRoutes = require 'config/routes.php';
        foreach($configRoutes as $key => $value) {
            $this->routes[$key] = $value;
        }
    }

    public function isRouteExists() {
        $url = trim(str_replace('/appointment-scheduling-app/', '', $_SERVER['REQUEST_URI']), '/');
        $cutUrl = explode("?", $url)[0];
        foreach($this->routes as $route => $params) {
            if($route === $cutUrl) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function start() {
        if($this->isRouteExists()) {
            $controllerPath = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
            if(class_exists($controllerPath) && method_exists($controllerPath, $this->params['method'])) {
                $method = $this->params['method'];
                $controller = new $controllerPath($this->params);
                $controller->$method();
            } else {
                echo 'Controller or method not found';
            }
        } else {
            echo 'Route not found';
        }
    }
}
