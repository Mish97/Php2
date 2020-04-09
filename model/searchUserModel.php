<?php
 require_once('../dbconnection.php');
 include("../config.php");
 class SearchUserModel extends Database
 {
    public function search($text){

        $query = $text; 
        //retreive any matches between the user's search query and databse records
        $sql="SELECT * FROM user 
        WHERE `Name` LIKE '$query' OR eMail LIKE '$query' 
        OR `username` LIKE '$query'";
        $result = $this->connect()->query($sql);

        return $result;
    }
 }
?>