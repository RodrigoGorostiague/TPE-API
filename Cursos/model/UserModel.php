<?php 
    class UserModel{
        private $db;
        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'
            .'dbname=db_cursos;charset=utf8',
            'root', '34632290');
        }
        function guardarUsuario($userName, $name, $lastName, $email, $password){
            $sentencia = $this->db->prepare("insert into user (username, name, lastname, email, password) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($userName, $name, $lastName, $email, $password));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>