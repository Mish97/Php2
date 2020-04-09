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
        
        <!--checking tokens-->
        <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator))
            {
                echo "Could not validate your requests!";
            } else{
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
                {
                    //closing php
                    ?> 

                    <form action="reset.password.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                        <input type="password" name="pwd" placeholder="Enter a new password..">
                        <input type="password" name="pwd-confirm" placeholder="Confirm the new password..">
                        <button type="submit" name="reset-password-submit">Reset password</button>
                    </form>
                    
                    
                    <?php 

                }
            }
        ?>

    </div>    
</body>
</html>