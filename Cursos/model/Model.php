<?php
    class Model{
        protected $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'
            .'dbname=db_cursos;charset=utf8',
            'root', '34632290');
        }
    }
?>