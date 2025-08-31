<?php

namespace controllers;

use core\Controller;

class AppointmentController extends Controller
{
    function __construct($params)
    {
        parent::__construct($params);
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $posts = $this->model->getAppointments();

        $args = [
            'appointments' => $posts,
        ];

        $this->view->render($args);
    }

    public function add()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $this->view->render();
    }

    public function edit()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $id = $_GET['id'] ?? null;

        $appointment = $this->model->getAppointment($id);

        $this->view->render(['appointment' => $appointment]);
    }

    public function addAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $dateTime = trim($_POST['date_time'] ?? '');

            if (empty($title) || empty($description) || empty($dateTime)) {
                $this->view->render(['error' => "All fields are required"], 'appointment/add');
                return;
            } else {
                $this->model->createAppointment($title, $description, $dateTime);
                header("Location: index");
                exit;
            }
        }
    }

    public function editAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $id = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $dateTime = trim($_POST['date_time'] ?? '');

            if (empty($title) || empty($description) || empty($dateTime)) {
                $this->view->render(['error' => "All fields are required"], 'appointment/edit');
                return;
            } else {
                $this->model->editAppointment($id, $title, $description, $dateTime);
                header("Location: index");
                exit;
            }
        }
    }

    public function deleteAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->deleteAppointment($id);
        }

        header("Location: index");
        exit;
    }

    public function finishAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->finishAppointment($id);
        }

        header('location: index');
        exit;
    }

    public function search()
    {
        $this->view->render();
    }

    public function searchAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = trim($_POST['search'] ?? '');

            if (empty($search)) {
                $this->view->render(['error' => "Enter text to search"], 'appointment/search');
                return;
            } else {
                $appointments = $this->model->searchAppointments($search);
                $this->view->render(['appointments' => $appointments], 'appointment/index');
                return;
            }
        }

        $this->view->render(['appointments' => []], 'appointment/index');
    }
}
