<?php
  require_once('libs/Smarty.class.php');   
    class LessonsView extends View{
        function showLessons($lessons, $temas, $user){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->assign('temas', $temas);
          $this->smarty->assign('user', $user);
          $this->smarty->display('templates/home.tpl');
        }
        function showLessonsCategoria($lessons, $temas, $item){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->assign('temas', $temas);
          $this->smarty->assign('item', $item);
          $this->smarty->display('templates/home.tpl');
        }
        function errorAdd($error, $lessons, $temas){
          $this->smarty->assign('error', $error);
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->assign('temas', $temas);
          $this->smarty->display('home.tpl');
        }
        function showDetail($lesson){
          $this->smarty->assign('lesson', $lesson);
          $this->smarty->display('detail.tpl');
        }
    }
?>