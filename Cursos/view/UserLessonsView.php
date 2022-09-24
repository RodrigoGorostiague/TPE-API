<?php
  require_once('libs/Smarty.class.php');   
    class UserLessonsView{
        private $smarty;
        function __construct(){
          $URL = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/';
          $this->smarty = new Smarty();
          $this->smarty->assign('URL', $URL);

        }
        function showUserLessons($lessons){
          $this->smarty->assign('lessons', $lessons);
          $this->smarty->display('templates/user_lessons.tpl');
        }
    }
?>