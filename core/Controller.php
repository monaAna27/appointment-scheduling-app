<?php 

namespace core;

use core\View;

class Controller {
    protected $params;
    protected $view;
    protected $model;

    public function __construct($params) {
        $this->params = $params;
        $this->view = new View($this->params);

        $modelPath = 'models\\'.ucfirst($params['controller']).'Model';
        $this->model = class_exists($modelPath) ? new $modelPath : null;
    }
}