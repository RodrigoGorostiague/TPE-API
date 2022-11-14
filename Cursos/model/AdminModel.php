<?php 
    class AdminModel extends Model{
        function addLesson($tema, $descripcion, $url_video, $url_slide){
            $sentencia = $this->db->prepare("insert into lesson (tema_id, descripcion, video_url, slide_url, likes) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($tema, $descripcion, $url_video, $url_slide, 0));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        
        function deleteLesson($lessonId){
            $sentencia = $this->db->prepare("delete from lesson where id=(?)");
            $sentencia->execute(array($lessonId));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function updateLesson($tema, $descripcion, $video_url, $slide_url, $lessonId){
            $sentencia = $this->db->prepare("update lesson set tema_id=(?), descripcion=(?), video_url=(?), slide_url=(?) where id = (?);");
            $result = $sentencia->execute(array($tema, $descripcion, $video_url, $slide_url, $lessonId));
            return $result;
            $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function addTema($tema){
            $sentencia = $this->db->prepare("insert into tema (name) value(?)");
            $sentencia->execute(array($tema));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>