
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>An e-mail will be send to your e-mail to reset your password.</p>
        <form action="reset-request.php" method="POST"> 
            <label>E-mail</label>
                <input type="text" name="email" placeholder="Enter your e-mail.">
                <button type="submit" name="reset-request-sub">Reset password by e-mail</button>           
        </form>
        <?php
            if (isset($_GET["reset"]))
            {
                if ($_GET["reset"] == "success")
                {
                    echo '<p class="signupsuccess">Check your e-mail!</p>';
                }
            }
        ?>
    </div>    
</body>
</html>