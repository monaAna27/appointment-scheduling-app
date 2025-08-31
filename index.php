<?php

require "core/Router.php";
require "core/Controller.php";
require "core/View.php";
require "core/Model.php";

require "controllers/AppointmentController.php";
require "controllers/AuthController.php";

require "models/AppointmentModel.php";
require "models/UserModel.php";

require "data/Database.php";
require "data/Appointment.php";

use core\Router;

session_start();

$router = new Router();
$router->start();
