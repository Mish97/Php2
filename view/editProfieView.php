<?php
    include('../controller/editProfileController.php');
    session_start();
    $controller = new EditProfileController();
    $data = $controller->ReceiveData($_SESSION['email']); //using the session email that was use to log in and storing it into "data"
    
    //taking the info that we received from "data"
    foreach($data as $res){
        $password=$res['password'];
        $name=$res['name'];
    }
    //isset($_POST['submit'])
    
    if($_SERVER["REQUEST_METHOD"] == "POST") { 
        header("location: ../../Jazz/view/jazz_view.php");
        $newEmail = $_POST['email'];
        $NewPass = $_POST['password'];
        $NewName = $_POST['name'];
        
        $update = $controller->UpdateData($newEmail, $NewPass, $NewName);
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
                <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>">
                            
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
              
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                
            </div> 
                 
            <input class="buttonsLila" type="submit" name="submit" value="Save"/>
    </form> 

    </section>

</body>
</html>