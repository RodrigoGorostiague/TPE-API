<?php 
    define('ACTION', 0);
    define('VAL1', 1);
    define('VAL2', 2);
    require_once 'controller/LessonsController.php';
    require_once 'config/ConfigApp.php';


    $controller = new LessonsController();
    function parseURL($URL){
        $explodedURL = explode('/', $URL);
        $arrayReturn[ConfigApp::$ACTION] = $explodedURL[ACTION];
        $arrayReturn[ConfigApp::$PARAMS] =(isset($explodedURL[VAL1])) ? array_slice($explodedURL,VAL1) : null; //if en una sola linea

        return $arrayReturn;
    }
    if (isset($_GET['action'])){
        $urlData = parseURL($_GET['action']);
        $action = $urlData[ConfigApp::$ACTION];
        if(array_key_exists($action, ConfigApp::$ACTIONS)){
            $params = $urlData[ConfigApp::$PARAMS];
            $metodo = ConfigApp::$ACTIONS[$action];
            if(isset($params) && ($params != null)){
               echo $controller->$metodo($params);
            }
            else{
               echo $controller->$metodo();
            }

        }
        
    }
    // if (($_GET['action'] == '')){
    //     $controller->home();
    // }else{
    //     $partURL = explode('/', $_GET['action']);
    //     if($partURL[0]==='home'){
    //         $controller->home();
    //     }
    //     elseif($partURL[0]==='mis-cursos'){
    //         $controller->myLessons();
    //     }
    //     elseif($partURL[0]==='agregar'){
    //         $controller->agregar($partURL[1]);
    //     }
    //     elseif($partURL[0]==='borrar'){
    //         $controller->borrar($partURL[1]);
    //     }
    // }
        
?>