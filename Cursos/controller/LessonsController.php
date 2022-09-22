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
            $URL = $this->model->getURL();
            $this->view->showLessons($lessons, $URL);
        }
        function myLessons() {
            $lessons = $this->model->getUserLessons();
            $URL = $this->model->getURL();
            $this->view->showUserLessons($lessons, $URL);
        }
        function agregar($lessonId) {
            $lessons = $this->model->getUserLessons();
            $this->model->addToList($lessonId);
            $this->home();
        }
        function borrar($lessonId) {
            $lessons = $this->model->getUserLessons();
            $this->model->deleteToList($lessonId);
            $this->myLessons();
        }
    }
?>