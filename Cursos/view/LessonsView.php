<?php
  require_once('libs/Smarty.class.php');   
    class LessonsView extends View{
        function showLessons($lessons){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->display('templates/home.tpl');
        }
        function errorAdd($error, $lessons){
          $this->smarty->assign('error', $error);
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->display('home.tpl');
        }
    }
?>