<?php
    require_once './view/UserView.php';
    require_once './model/UserModel.php';

    class UserController extends Controller{
        function __construct(){
            $this->view = new UserView();
            $this->model = new UserModel();
        }
        function login() {
            $this->view->showLogin();
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