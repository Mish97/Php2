<?php
require ('config.php');
require ('dbconnection.php');


if (isset($_POST["reset-password-submit"]))
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordconf = $_POST["pwd-confirm"];

    //check if the password fields are filled
    if (empty($password) || empty($passwordconf))
    {
        header("Location: create-new-password.php?newpwd=empty");
        exit();
    }else if ($password != $passwordconf) {
        header("Location: create-new-password.php?newpwd=pwdnotmatch");
        exit();
    }

    //checking if tokens is expired
    $currentDate = date("U");


    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? ";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "There was an error 3!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s",$selector);
        mysqli_stmt_execute($stmt);
        
    }

    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) 
    {
        echo "You need to re-submit your reset request.";
        exit();
    } else {
        
        //converting token 
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
    }

    if ($tokenCheck == false)
    {
        echo "You need to re-submit your reset request.";
        exit();
    } else if ($tokenCheck == true) {
        
        $tokenEmail = $row['pwdResetEmail'];
        echo $tokenEmail;
        
        $sql = "SELECT * FROM user WHERE eMail=?;";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "There was an error 4!";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) 
            {
                echo "There was an error 5!";
                exit();
            } else {
                //Updating the password to the database
                $sql = "UPDATE user SET password=? WHERE eMail=?";
                $stmt = mysqli_stmt_init($mysqli);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "There was an error 6!";
                    exit();
                } else {
                    $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    //Deleting token
                    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                    $stmt = mysqli_stmt_init($mysqli);
                    if (!mysqli_stmt_prepare($stmt, $sql))
                    {
                        echo "There was an error 7!";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s",$tokenEmail);
                        mysqli_stmt_execute($stmt);
                        header("Location: login.php?newpwd=passwordupdated");
                    }
                }
            }
        }
    }

}else{
    header("Location: index1.php");
}
?>