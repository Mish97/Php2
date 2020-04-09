<?php
    require_once("../model/editProfileModel.php");
    
    class EditProfileController
    {
        
        public function ReceiveData($email){
            $Model=new editProfileModel();
            $var = $Model->getData($email); //storing the data received from the model
            return $var;
        }

        public function UpdateData($email, $password, $uname, $name){
            $Model=new editProfileModel();
            $var = $Model->updateData($email, $password, $uname, $name);            
        }

    }
    
?>