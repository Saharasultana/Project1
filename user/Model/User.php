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
    public function addUser($fullname,$email,$username,$password, $image){
        $st = $this->db->prepare("INSERT INTO user(fullname,email,username,password,image) VALUES (:fullname,:email,:username,:password,:image)");
        $st->bindParam(':fullname',$fullname);
        $st->bindParam(':email',$email);
        $st->bindParam(':username',$username);
        $st->bindParam(':password',$password);
        $st->bindParam(':image',$image);
        $st->execute();
        return true;
    }
}
