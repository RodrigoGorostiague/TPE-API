<?php
    class UserLessonsModel extends Model{
        function getUserLessons(){
            $sentencia = $this->db->prepare("select * from user_lessons ul left join lessons l on ul.lessons_id = l.id where ul.user_id =1");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function deleteToList($lessonId){
            $sentencia = $this->db->prepare("delete from user_lessons where user_id=(?) AND lessons_id=(?)");
            $sentencia->execute(array(1,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>