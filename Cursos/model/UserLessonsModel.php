<?php
    class UserLessonsModel extends Model{
        function getUserLessons($userId){
            $sentencia = $this->db->prepare("SELECT * FROM user_lessons INNER JOIN lesson ON user_lessons.lesson_id = lesson.id INNER JOIN tema ON lesson.tema_id = tema.id WHERE user_lessons.user_id =  (?)");
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