<?php 
    class LessonsModel{
        function __construct(){

        }
        private function connect(){
            return new PDO('mysql:host=localhost;'
            .'dbname=db_cursos;charset=utf8',
            'root', '34632290');
        }
        
        function getURL(){
            return 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/'; 
          }

        function getLessons(){
            $db = $this->connect();
    
            $sentencia = $db->prepare("SELECT * FROM lessons");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getUserLessons(){
            $db = $this->connect();
    
            $sentencia = $db->prepare("select * from user_lessons ul left join lessons l on ul.lessons_id = l.id where ul.user_id =1");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function addToList($lessonId){
            $db = $this->connect();
            $sentencia = $db->prepare("insert into user_lessons (user_id, lessons_id) value (?, ?)");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        }
        function deleteToList($lessonId){
            $db = $this->connect();
            $sentencia = $db->prepare("delete from user_lessons where user_id=(?) AND lessons_id=(?)");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            
        }
    }
?>