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
    public function filter($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function imageUpload($dir,$imageArr){
        #die('died'.'<pre>'.print_r($imageArr, true));
        $target_dir = $dir."/"; // uploads/
        $target_file = $target_dir . basename($imageArr["name"]);
        //initially permission is 1
        $uploadOk = 1;
        $message = '';
        if(!getimagesize($imageArr["tmp_name"])){
            $uploadOk = 0;
            $message .= 'File is not an image';
        }
        //check file size
        if ($imageArr["size"] > 500000) {
            $message .= "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        //accepted file type
        $accepted_file_type = array('jpg','jpeg','png','gif');
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(!in_array($imageFileType,$accepted_file_type)){
            $uploadOk = 0;
            $message .= 'This type of file is not accepted';
        }
        //if uploadOk 1 then proceed else show error
        if($uploadOk == 1){
            move_uploaded_file($imageArr['tmp_name'], $target_file);
            return array('result' => true, 'data' => $target_file);
        }else{
            return array('result' => false, 'data' => $message);
        }
    }
}