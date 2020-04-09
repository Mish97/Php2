<?php

if(isset($_POST["reset-request-sub"]))
{
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
  //ako e nujno dobavi predi /create drugo / s imeto na papata v koqto e faila
    $url = "www.627091.epizy.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require ('config.php');
    
    $userEmail = $_POST["email"];

    //deleting existing tockens from database of the user
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "There was an error 1!";
        exit();
    } else{
        mysqli_stmt_bind_param($stmt, "s",$userEmail);
        mysqli_stmt_execute($stmt);
    }

    //inserting token into the database

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "There was an error 2!";
        exit();
    } else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    //close statement
    mysqli_stmt_close($stmt);

    //close connection
    mysqli_close($mysqli);

    //sending e-mail
    $to = $userEmail;

    $subject = 'Reset your password for Websy';

    $message = '<p>We received a password request. This is link to reset your password</p>';
    //continuing the message above
    $message .='<p> Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: <s627091@localhost>\r\n";
    $headers .= "Reply-To: ".$to."\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
    
    header("Location: reset-password.php?reset=success");


}
else {
 header("Location: homepage.php");
}

?>