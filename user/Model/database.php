<?php
class Database{
    public $db;
    public function __construct()
    {
        $con=new PDO("mysql:host=localhost;dbname=bujobud","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!isset($this->db)){
            $this->db = $con;
        }
    }
}