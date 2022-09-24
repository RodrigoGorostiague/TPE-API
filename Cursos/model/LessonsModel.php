<?php 
    class LessonsModel extends Model{
        function getLessons(){
            $sentencia = $this->db->prepare("SELECT * FROM lessons");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function addToList($lessonId){
            $sentencia = $this->db->prepare("insert into user_lessons (user_id, lessons_id) value (?, ?)");
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
    }
?>