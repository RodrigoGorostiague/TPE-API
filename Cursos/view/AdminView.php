<?php
  require_once('libs/Smarty.class.php'); 

  class AdminView extends View{
    function showCmd($lessons, $temas, $user){
      $this->smarty->assign('lessons', $lessons);
      $this->smarty->assign('temas', $temas);
      $this->smarty->assign('user', $user);
      $this->smarty->display('templates/cmd.tpl');
    }
    function successCmd($lessons, $temas, $user, $succes){
      $this->smarty->assign('lessons', $lessons);
      $this->smarty->assign('temas', $temas);
      $this->smarty->assign('user', $user);
      $this->smarty->assign('succes', $succes);
      $this->smarty->display('templates/cmd.tpl');
    }
    function errorCmd($lessons, $temas, $user, $error){
      $this->smarty->assign('lessons', $lessons);
      $this->smarty->assign('temas', $temas);
      $this->smarty->assign('user', $user);
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/cmd.tpl');
    }
  }
?>