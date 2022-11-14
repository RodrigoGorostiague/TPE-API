<?php
  require_once('libs/Smarty.class.php');   
    class UserView extends View{
        function showSignIn($user){
          $this->smarty->assign('user', $user);
          $this->smarty->display('signin.tpl');
        }
        function showLogIn($user){
          $this->smarty->assign('user', $user);
          $this->smarty->display('login.tpl');
        }
        function thxPage(){
          $this->smarty->display('thx.tpl');
        }
        function errorSignIn($error){
          $this->smarty->assign('error', $error);
          $this->smarty->display('signin.tpl');
        }
        function errorLogin($error, $user){
          $this->smarty->assign('error', $error);
          $this->smarty->assign('user', $user);

          $this->smarty->display('login.tpl');
        }
    }
?>