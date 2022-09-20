<?php
    require_once './view/LessonsView.php';
    require_once './model/LessonsModel.php';

    class LessonsController{
        private $view;
        private $model;
       
        function __construct(){
            $this->view = new LessonsView();
            $this->model = new LessonsModel();
        }
        function home() {
            $lessons = $this->model->getLessons();
            $this->view->show($lessons);
        }
    }
?>