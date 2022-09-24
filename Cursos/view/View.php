<?php
    class View{
        protected $smarty;
        function __construct(){
          $URL = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/';
          $this->smarty = new Smarty();
          $this->smarty->assign('URL', $URL);
        }
    }
?>