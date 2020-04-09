<?php
    require_once("../model/editProfileModel.php");
    
    class EditProfileController
    {
        
        public function ReceiveData($email){
            $Model=new editProfileModel();
            $var = $Model->getData($email); //string the data received from the model
            return $var;
        }

        public function UpdateData($email, $password, $name){
            $Model=new editProfileModel();
            $var = $Model->updateData($email, $password, $name);            
        }

    }
    
?>