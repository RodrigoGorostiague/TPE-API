<?php
    require_once './view/UserView.php';
    require_once './model/UserModel.php';

    class UserController{
        private $UserView;
        private $UserModel;
       
        function __construct(){
            $this->UserView = new UserView();
            $this->UserModel = new UserModel();
        }
        function login() {
            $this->UserView->showLogin();
        }
        function newUser(){
            if(!empty($_POST['userName']) && (!empty($_POST['name'])) && (!empty($_POST['lastName'])) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userName= ($_POST['userName']);
            $name= $_POST['name'];
            $lastName= $_POST['lastName'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $this->UserModel->guardarUsuario($userName, $name, $lastName, $email, $password);
            $this->UserView->thxPage();
            }else{
                $this->UserView->errorLogin("Todos los campos son requeridos");
            }
        }
    }
?>