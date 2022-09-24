<?php
  require_once('libs/Smarty.class.php');   
    class UserView extends View{
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