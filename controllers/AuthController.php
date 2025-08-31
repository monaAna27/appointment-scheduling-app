<?php

namespace controllers;

use core\Controller;
use models\UserModel;

class AuthController extends Controller
{
    function __construct($params)
    {
        parent::__construct($params);

        $this->model = new UserModel;
    }

    public function login()
    {
        $this->view->render();
    }

    public function register()
    {
        $this->view->render();
    }

    public function loginAction()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $error = $this->model->login($login, $password);

        if ($error) {
            $this->view->render(['error' => $error], 'auth/login');
        }
    }

    public function registerAction()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $error = $this->model->register($login, $password);

        if ($error) {
            $this->view->render(['error' => $error], 'auth/register');
        }
    }

    public function logoutAction()
    {
        $_SESSION = [];
        session_unset();

        session_destroy();

        header('Location: login');
    }
}
