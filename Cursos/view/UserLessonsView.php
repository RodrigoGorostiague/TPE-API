<?php
  require_once('libs/Smarty.class.php');   
    class UserLessonsView extends View{
        function showUserLessons($lessons, $user){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->assign('user', $user);
          $this->smarty->display('templates/user_lessons.tpl');
        }
    }
?>