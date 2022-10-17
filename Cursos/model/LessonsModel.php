<?php 
    class LessonsModel extends Model{
        function getLessons(){
            $sentencia = $this->db->prepare("select t.name as tema, l.id, l.descripcion, l.video_url, l.slide_url, l.img_src, l.likes from lesson l join tema t on l.tema_id=t.id order by t.id ;");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getAllTema(){
            $sentencia = $this->db->prepare("select * from tema");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        
        function getAllTemaAndLesson(){
            $sentencia = $this->db->prepare("select DISTINCTROW t.name as tema, t.id as tema_id, l.id, l.descripcion, l.video_url, l.slide_url, l.img_src, l.likes from lesson l join tema t on l.tema_id=t.id order by t.id;");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getCategoriesList($item){
            $sentencia = $this->db->prepare("select t.name as tema, l.id, l.descripcion, l.video_url, l.slide_url, l.img_src, l.likes from lesson l join tema t on l.tema_id=t.id and t.name=(?) order by t.id;");
            $sentencia->execute($item);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        }
        function getLessonById($item){
            $sentencia = $this->db->prepare("select  t.name as tema, l.id, l.descripcion, l.video_url, l.slide_url, l.img_src, l.likes from lesson l join tema t on l.tema_id=t.id and l.id=? order by t.id;");
            $sentencia->execute($item);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        }
        function addToList($lessonId, $userId){
            $sentencia = $this->db->prepare("insert into user_lessons (user_id, lesson_id) value (?, ?)");
            $sentencia->execute(array($userId, $lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function addLike($lessonId){
            $sentencia = $this->db->prepare("update lesson set likes = likes +1 where id = (?);");
            $sentencia->execute(array($lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function alredyExist($lessonId, $userId){
            $sentencia = $this->db->prepare("select lesson_id from user_lessons where user_id =(?) and lesson_id =(?);");
            $sentencia->execute(array($userId,$lessonId[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>