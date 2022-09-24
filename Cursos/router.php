<?php 
    define('ACTION', 0);
    define('PARAMS', 1);
    
    require_once 'controller/LessonsController.php';
    require_once 'controller/UserLessonsController.php';
    require_once 'controller/UserController.php';
    require_once 'config/ConfigApp.php';

    function parseURL($URL){
        $explodedURL = explode('/', $URL);
        $arrayReturn[ConfigApp::$ACTION] = $explodedURL[ACTION];
        $arrayReturn[ConfigApp::$PARAMS] =(isset($explodedURL[PARAMS])) ? array_slice($explodedURL,PARAMS) : null; //if en una sola linea
        return $arrayReturn;
    }
    if (isset($_GET['action'])){
        $urlData = parseURL($_GET['action']);
        $action = $urlData[ConfigApp::$ACTION];
        if(array_key_exists($action, ConfigApp::$ACTIONS)){
            $params = $urlData[ConfigApp::$PARAMS];
            $action = explode('#', ConfigApp::$ACTIONS[$action]);
            $controller = new $action[0]();
            $metodo = $action[1];
            if(isset($params) && ($params != null)){
               echo $controller->$metodo($params);
            }
            else{
               echo $controller->$metodo();
            }
        }
    }     
?>