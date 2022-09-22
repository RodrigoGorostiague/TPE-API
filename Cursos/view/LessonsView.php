<?php
  require('libs/Smarty.class.php');   
    class LessonsView{
        
        function __construct(){
        
        }

        function showLessons($lessons,$URL){
          $smarty = new Smarty();
          $smarty->assign('lessons', $lessons);
          $smarty->assign('URL', $URL);
          $smarty->display('templates/home.tpl');
        }
        function showUserLessons($lessons, $URL){
          $smarty = new Smarty();
          $smarty->assign('lessons', $lessons);
          $smarty->assign('URL', $URL);
          $smarty->display('templates/user_lessons.tpl');
        }
    }
?>