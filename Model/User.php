<?php
include_once 'Database.php';

class User extends Database{

    public function isExistUserWithEmail($email){
        $st = $this->db->prepare("SELECT * FROM user WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        if($st->rowCount()){
            return true;
        }
        return false;
    }
    public function addUser($fullname,$email,$username,$password,$image,$created_at){
        $st = $this->db->prepare("INSERT INTO user(fullname,email,username,password,image,created_at) VALUES (:fullname,:email,:username,:password,:image,:created_at)");
        $st->bindParam(':fullname',$fullname);
        $st->bindParam(':email',$email);
        $st->bindParam(':username',$username);
        $st->bindParam(':password',$password);
        $st->bindParam(':image',$image);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return true;
    }
}
