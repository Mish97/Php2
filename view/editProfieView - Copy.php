<?php

    include('../controller/editProfileController.php');
    session_start();

    $controller = new EditProfileController();
    
    $data = $controller->ReceiveData($_SESSION['email']); //using the session email that was used to login and storing it into "data"

    //taking the information that we received from "data"
    foreach($data as $res){
        $email=$res['eMail'];
        $password=$res['password'];
        $uname=$res['username'];
        $name=$res['Name'];
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {         
        header("location: ../success_change.php");
        $newEmail = $_POST['email'];
        $NoHash = $_POST['password'];
        $NewPassHash = password_hash($NoHash, PASSWORD_DEFAULT);
        $NewUname = $_POST['uname'];
        $NewName = $_POST['name'];
        
        $update = $controller->UpdateData($newEmail, $NewPassHash, $NewUname, $NewName);
        session_destroy(); //ending session 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Profile</title>
        <link href="css/style-searchUsers.css" rel="stylesheet" type="text/css">
    </head>
    <body> 
    <section class="section">
        <h1> Edit Profile </h1>
        <hr id="longLine"/>
    </section>
    <form method="POST" action="#">  
            <div class="form-group">
                <label>E-mail Address</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
                            
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
              
                <label>Username</label> 
                <input type="text" name="uname" value="<?php echo $uname; ?>">
                
                <label>Name</label> 
                <input type="text" name="name" value="<?php echo $name; ?>">

                <p>Changes on your email will result in login prompt.</p> 
                <p><font color="red">Please enter your current or new password before clicking "Save".</font></p> 
                
            </div> 
                 
            <input class="buttonsLila" type="submit" name="submit" value="Save"/>
            <a href="../homepage.php">Back</a>
    </form> 

    </section>

</body>
</html>