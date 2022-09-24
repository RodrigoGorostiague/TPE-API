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
            $this->view->showLessons($lessons);
        }
        function myLessons() {
            $lessons = $this->model->getUserLessons();
            $this->view->showUserLessons($lessons);
        }
        function login() {
            $this->view->showLogin();
        }
        function agregar($lessonId) {
            $lessons = $this->model->getUserLessons();
            if(empty($this->model->alredyExist($lessonId))){
                $this->model->addToList($lessonId);
                $this->home();
            }else{
                $lessons = $this->model->getUserLessons();
                $this->view->errorAdd("Ya Tienes esta clase guardada", $lessons);
            }
        }
        function borrar($lessonId) {
            $lessons = $this->model->getUserLessons();
            $this->model->deleteToList($lessonId);
            $this->myLessons();
        }
        function like($lessonId){
            $lessons = $this->model->getLessons();
            $this->model->addLike($lessonId);
            $this->home();
        }
        function newUser(){
            if(!empty($_POST['userName']) && (!empty($_POST['name'])) && (!empty($_POST['lastName'])) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userName= ($_POST['userName']);
            $name= $_POST['name'];
            $lastName= $_POST['lastName'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $this->model->guardarUsuario($userName, $name, $lastName, $email, $password);
            $this->view->thxPage();
            }else{
                $this->view->errorLogin("Todos los campos son requeridos");
            }
        }
    }
?>