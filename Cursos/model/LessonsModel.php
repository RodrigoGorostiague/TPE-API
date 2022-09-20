<?php 
    class LessonsModel{
        function __construct(){

        }
        private function connect(){
            return new PDO('mysql:host=localhost;'
            .'dbname=db_cursos;charset=utf8',
            'root', '34632290');
        }

        function getLessons(){
            $db = $this->connect();
    
            $sentencia = $db->prepare("SELECT * FROM lessons");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>