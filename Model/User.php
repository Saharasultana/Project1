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
    public function addUser($fullname,$email,$password,$image,$created_at){
        $st = $this->db->prepare("INSERT INTO user(fullname,email,password,image,created_at) VALUES (:fullname,:email,:password,:image,:created_at)");
        $st->bindParam(':fullname',$fullname);
        $st->bindParam(':email',$email);
        $st->bindParam(':password',$password);
        $st->bindParam(':image',$image);
        $st->bindParam(':created_at',$created_at);
        $st->execute();
        return $this->db->lastInsertId();
    }
    public function getUserById($id){
        $st = $this->db->prepare("SELECT * FROM user WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getUserProfileCompletion($id){
        $st = $this->db->prepare("SELECT fullname,email,image,profession,dob,sex,bio FROM user WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        $count = 0;
        foreach ($resultSet as $result){
            if(is_null($result) || $result == ''){
                $count++;
            }
        }
        $final = 7-$count;
        $final = $final/7 * 100;
        $final = number_format((float)$final, 2, '.', '');
        return $final.'%';
    }
    public function getUserByEmail($email){
        $st = $this->db->prepare("SELECT * FROM user WHERE email=:email");
        $st->bindParam(':email',$email);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }

}
