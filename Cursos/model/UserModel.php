<?php 
    class UserModel extends Model{
        function guardarUsuario($userName, $name, $lastName, $email, $hash){
            $sentencia = $this->db->prepare("insert into user (username, name, lastname, email, password) value(?, ?, ?, ?, ?)");
            $sentencia->execute(array($userName, $name, $lastName, $email, $hash));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
        function getUser($userName){
            $sentencia = $this->db->prepare("select * from user where username=? limit 1");
            $sentencia->execute(array($userName));
            $user = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $user[0];
        }
        function updateUser($token, $token_iat, $token_exp, $admin, $userId){
            $sentencia = $this->db->prepare("update user set token=(?), token_iat=(?), token_exp=(?), admin=(?) where id=? ");
            $sentencia->execute(array($token, $token_iat, $token_exp, $admin, $userId));
            return  $sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>