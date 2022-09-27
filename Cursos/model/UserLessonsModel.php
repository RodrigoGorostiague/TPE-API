<?php
    class UserLessonsModel extends Model{
        function getUserLessons($userId){
            $sentencia = $this->db->prepare("select * from user_lessons ul left join lessons l on ul.lessons_id = l.id where ul.user_id = (?)");
            $sentencia->execute([$userId]);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function deleteToList($lessonId, $userId){
            $sentencia = $this->db->prepare("delete from user_lessons where user_id=(?) AND lessons_id=(?)");
            $sentencia->execute(array($userId,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>