<?php
    class View{
        protected $smarty;
        function __construct(){
          
          $this->smarty = new Smarty();
          $this->smarty->assign('URL', BASE_URL);
        }
    }
?>