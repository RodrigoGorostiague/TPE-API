<?php
  require_once('libs/Smarty.class.php');   
    class UserView{
        private $smarty;
        function __construct(){
          $URL = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/';
          $this->smarty = new Smarty();
          $this->smarty->assign('URL', $URL);
        }
        function showLogin(){
          $this->smarty->display('login.tpl');
        }
        function thxPage(){
          $this->smarty->display('thx.tpl');
        }
        function errorLogin($error){
          $this->smarty->assign('error', $error);
          $this->smarty->display('login.tpl');
        }
    }
?>