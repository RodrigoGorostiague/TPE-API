<?php 
    class LessonsModel{
        private $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'
            .'dbname=db_cursos;charset=utf8',
            'root', '34632290');
        }

        function getLessons(){
            
            $sentencia = $this->db->prepare("SELECT * FROM lessons");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getUserLessons(){
            
            $sentencia = $this->db->prepare("select * from user_lessons ul left join lessons l on ul.lessons_id = l.id where ul.user_id =1");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function addToList($lessonId){
            $sentencia = $this->db->prepare("insert into user_lessons (user_id, lessons_id) value (?, ?)");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        }
        function deleteToList($lessonId){
            $sentencia = $this->db->prepare("delete from user_lessons where user_id=(?) AND lessons_id=(?)");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            
        }
        function addLike($lessonId){
            $sentencia = $this->db->prepare("update lessons set likes = likes +1 where id = (?);");
            $sentencia->execute(array($lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        }
        function alredyExist($lessonId){
            $sentencia = $this->db->prepare("select lessons_id from user_lessons where user_id =(?) and lessons_id =(?);");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        }
        function guardarUsuario($userName, $name, $lastName, $email, $password){
            $sentencia = $this->db->prepare("insert into user (username, name, lastname, email, password) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($userName, $name, $lastName, $email, $password));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>