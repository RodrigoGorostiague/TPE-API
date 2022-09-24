<?php 
    class UserModel extends Model{
        function guardarUsuario($userName, $name, $lastName, $email, $password){
            $sentencia = $this->db->prepare("insert into user (username, name, lastname, email, password) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($userName, $name, $lastName, $email, $password));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>