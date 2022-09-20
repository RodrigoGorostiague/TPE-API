<?php 
    require_once 'index.php';
    require_once 'controller/LessonsController.php';

    $controller = new LessonsController();

    if ($_GET['action'] == ''){
        $controller->home();
    }else{
       
    }
?>