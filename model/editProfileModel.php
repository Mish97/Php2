<?php
 require_once('../../dbconnection/dbconnection.php');
 class EditProfileModel extends Database
 {
    public function getData($email){
        $sql="SELECT * from user WHERE eMail='$email'";
        $result = $this->connect()->query($sql); //izvyrshvaneto na stmt
        $row=$result->fetch_assoc(); //gets the result and stores it in array row
        $count=$result->num_rows;
        if($count>0){
            $rows[]=$row;
            return $rows;
        }
        
    }
    

    public function updateData($email, $password, $name){

    $sql="UPDATE `user` SET eMail ='$email', `password`='$password', `Name`='$name' WHERE eMail='{$_SESSION['email']}'";
        $result = $this->connect()->query($sql); //izvyrshvaneto na stmt
    }
 }
?>