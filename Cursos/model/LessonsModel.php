<?php 
    class LessonsModel extends Model{
        function white_list($value, $allowed, $message) {
            if ($value === null) {
                return $allowed[0];
            }
            $key = array_search($value, $allowed, true);
            if ($key === false) { 
                throw new InvalidArgumentException($message); 
            }
             else {
                return $value;
            }
        }
    
        function getLessons($orden = []){
            $order = 'lessonId';
            $direction = 'ASC';
            $limit = 999;
            $offset = 0;
        if (isset($orden['sort'])) {
            $order = $orden['sort'];
        }        
        if (isset($orden['order'])) {
            $direction = $orden['order'];
        }
        if (isset($orden['tema'])) {
            $tema = $orden['tema'];
        }
        if (isset($orden['limit'])) {
            $limit = $orden['limit'];
        }
        if (isset($orden['offset'])) {
            $offset = $orden['offset'];
        }
        $order = $this->white_list($order, ["lessonId", "tema","descripcion", "video", "slide"], "Columna no valida");
        $direction = $this->white_list($direction, ["ASC","DESC"], "Direccion de ORDER BY no valida");
        $sql = "select t.name as tema, l.id as lessonId, l.descripcion as descripcion, l.video_url as video, l.slide_url as slide, l.img_src as imgScr, l.likes as likes from lesson l join tema t on l.tema_id=t.id and t.name like '%$tema%' order by $order $direction limit $limit offset $offset";
            $sentencia = $this->db->prepare($sql);
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
            $sentencia->execute(array($item[0]));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        }
        function getLessonById($item){
            $sentencia = $this->db->prepare("select  t.name as tema, l.id, l.descripcion, l.video_url, l.slide_url, l.img_src, l.likes from lesson l join tema t on l.tema_id=t.id and l.id=? order by t.id;");
            $sentencia->execute($item);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);

        }        
        function getLesson($item, $colname = NULL){
            $colname = "t.name as tema, l.id as lessonId, l.descripcion as descripcion, l.video_url as video, l.slide_url as slide, l.img_src as imgScr, l.likes as likes ";
            $sql = "SELECT $colname FROM lesson l join tema t on l.tema_id=t.id and l.id=? order by t.id";
            $sentencia = $this->db->prepare("$sql");
            $sentencia->execute(array($item));
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
