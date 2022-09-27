<?php 
    class UserModel extends Model{
        function guardarUsuario($userName, $name, $lastName, $email, $hash){
            $sentencia = $this->db->prepare("insert into user (username, name, lastname, email, password) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($userName, $name, $lastName, $email, $hash));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getUser($userName){
            $sentencia = $this->db->prepare("select * from user where username=? limit 1");
            $sentencia->execute([$userName]);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>