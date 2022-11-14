<?php
require_once("Router.php");
require_once 'model/Model.php';

require_once("./api/LessonsApiController.php");
require_once("./api/UserApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("lessons", "GET", "LessonsApiController", "getLessons");
$router->addRoute("lessons/:ID", "GET", "LessonsApiController", "getLesson");
$router->addRoute("lessons/:ID/:COLNAME", "GET", "LessonsApiController", "getLesson");
$router->addRoute("lessons/:ID", "DELETE", "LessonsApiController", "deleteLesson");
$router->addRoute("lessons", "POST", "LessonsApiController", "addLesson");
$router->addRoute("lessons/:ID", "PUT", "LessonsApiController", "updateLesson");
$router->addRoute("user/token", "GET", "UserApiController", "getToken");
$router->addRoute("user/:ID", "GET", "UserApiController", "getUser");


// rutea
$router->route($resource, $method);

