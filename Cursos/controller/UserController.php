<?php
    require_once './view/UserView.php';
    require_once './model/UserModel.php';

    class UserController extends Controller{
        function __construct(){
            $this->view = new UserView();
            $this->model = new UserModel();
        }
        function signIn() {
            $this->view->showSignIn();
        }
        function newUser(){
            if(!empty($_POST['userName']) && (!empty($_POST['name'])) && (!empty($_POST['lastName'])) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userName= ($_POST['userName']);
            $name= $_POST['name'];
            $lastName= $_POST['lastName'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this->model->guardarUsuario($userName, $name, $lastName, $email, $hash);
            $this->view->thxPage();
            }else{
                $this->view->showLogIn();
            }
        }
        function logIn() {
            $this->view->showLogIn();
        }
        function userValidate(){
            $userName= $_POST['userName'];
            $password= $_POST['password'];
            if(!empty($userName) && !empty($password)){
                $user = $this->model->getUser($userName);
                if (!empty($user) && password_verify($password, $user[0]['password'])){
                    session_start();
                    $_SESSION['USER'] = $userName;
                    $_SESSION['USER_ID'] = $user[0]['id'];
                    $_SESSION['LAST_ACTIVITY'] = time();
                    echo header('Location: http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
                }else{
                    $this->view->errorLogin("Usuario o password incorrectos");
                } 
            }
        }
        public function logOut(){
            session_start();
            session_destroy();
            echo header('Location: http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');
        }
    }
?>