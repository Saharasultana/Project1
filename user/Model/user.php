<?php
include_once 'database.php';

class User extends database{

    public function isExistUserByUserNameAndPassword($username, $password){
        $check = $this->db->query('SELECT * FROM user WHERE username=$username AND password = $password');
        if ($check->num_rows > 0) {
            // output data of each row
            return true;
        }
        return false;
    }
}
