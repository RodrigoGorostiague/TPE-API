<?php
  require_once('libs/Smarty.class.php');   
    class UserLessonsView extends View{
        function showUserLessons($lessons){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->display('templates/user_lessons.tpl');
        }
    }
?>