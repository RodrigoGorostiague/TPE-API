<?php
  require_once('libs/Smarty.class.php');   
    class UserView extends View{
        function showSignIn(){
          $this->smarty->display('signin.tpl');
        }
        function showLogIn(){
          $this->smarty->display('login.tpl');
        }
        function thxPage(){
          $this->smarty->display('thx.tpl');
        }
        function errorSignIn($error){
          $this->smarty->assign('error', $error);
          $this->smarty->display('signin.tpl');
        }
        function errorLogin($error){
          $this->smarty->assign('error', $error);
          $this->smarty->display('login.tpl');
        }
    }
?>