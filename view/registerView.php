<?php
//include ('model/registerModel.php');

include ('../controller/registerController.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/alphabet-1896957-640-90x94.png" type="image/x-icon">
  <meta name="description" content="">
  <link rel="stylesheet" href="../stylesheet.css">

    <title>Sign Up</title>
    
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
 
 <script async  src="https://cdn.ampproject.org/v0.js"></script>
 <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
 <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>

 <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>

<amp-sidebar id="sidebar" class="cid-rEY9FP73nz" layout="nodisplay" side="right">
        <div class="builder-sidebar" id="builder-sidebar">
            <button on="tap:sidebar.close" class="close-sidebar">
                <span></span>
                <span></span>
            </button>
        
            
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown open">
                    <a class="nav-link link dropdown-toggle text-white display-7" data-toggle="dropdown-submenu" aria-expanded="true">
                        Services</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item text-white display-7" href="page4.html">Web Designer</a><a class="dropdown-item text-white display-7" href="page10.html" aria-expanded="false">Web Developer<br></a><a class="text-white dropdown-item display-7" href="page9.html" aria-expanded="false">Designs</a><a class="text-white dropdown-item display-7" href="page6.html" aria-expanded="false">Offer a Service?</a>
                        
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link link text-white display-7" href="page2.html">Search users</a></li></ul>
            
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white-outline display-7" href="page1.html">
                  Log in</a></div>
      </div>
    </amp-sidebar>
  <section class="menu horizontal-menu cid-rEY9FP73nz" id="menu2-5">

    
    

    <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
      <div class="brand">
          <span class="brand-logo">
              <amp-img src="assets/images/alphabet-1896957-640-90x94.png" layout="responsive" width="45" height="47" alt="Mobirise" class="mobirise-loader">
                  <div placeholder="" class="placeholder">
                                <div class="mobirise-spinner">
                                    <em></em>
                                    <em></em>
                                    <em></em>
                                </div></div>
                  <a href="index.html"></a>
              </amp-img>
          </span>
          <p class="brand-name mbr-fonts-style mbr-bold display-5"><a href="index.html" class="text-white">Websy</a></p>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown open">
                    <a class="nav-link link dropdown-toggle text-white display-7" data-toggle="dropdown-submenu" aria-expanded="true">
                        Services</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item text-white display-7" href="page4.html">Web Designer</a><a class="dropdown-item text-white display-7" href="page10.html" aria-expanded="false">Web Developer<br></a><a class="text-white dropdown-item display-7" href="page9.html" aria-expanded="false">Designs</a><a class="text-white dropdown-item display-7" href="page6.html" aria-expanded="false">Offer a Service?</a>
                        
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link link text-white display-7" href="page2.html">Search users</a></li></ul>
            
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white-outline display-7" href="page1.html">
                  Log in</a></div>
      </div>
      
      <button on="tap:sidebar.toggle" class="ampstart-btn hamburger sticky-but">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </button>
    </nav>

</section>

    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="namee" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span> 
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="wrap form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" id="pass"  maxlength="15" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
                
            </div>
            <div class="wrap">
                <p class= "head"> Password Strength:</p>
                <p class="strength" id = "length"> </p>
            </div>
            
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="g-recaptcha" data-sitekey="6Le9l8IUAAAAAPw9-d_6wnXXWr20tbjdfipMdumV"></div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>

        <?php
        if (isset($_GET["newpwd"]))
        {
            if ($_GET["newpwd"] == "passwordupdated")
            {
                echo '<p class="signupsuccess">Your password has been reset!</p';
            }
        }
        ?>

        <a href="reset-password.php" class="btn btn-warning">Forgot your password?</a>
    </div> 
    
    <section class="footer1 cid-rEYcz3SyJW" id="footer1-6">  
    <div class="container">
        <div class="mbr-col-sm-12 align-center mbr-white">
            <p class="mbr-text mbr-fonts-style display-7">
                © Copyright 2020 - Mihaela Yordanova - All Rights Reserved
            </p>
        </div>
    </div>
</section>
</body>
<script>
    pass.addEventListener('keyup', function(){
        strength();
    })
    function strength(){
        var val = document.getElementById("pass").value;
        var status = document.getElementById("length");
        var count = 0;

        if( val!="")
        {
            
            if(val.length <= 5)
            {
                count=1;
            }
            if(val.length > 5 && val.length <= 10)
            {
                count=2;
            }
            if(val.length > 10 && val.length <= 15)
            {
                count=3;
            }
            

            if(count == 1)
            {
                status.innerHTML="WEAK";
                status.style.background="#FF0000";
                status.style.color="#ffffff";
            }
            if(count == 2)
            {
                status.innerHTML="GOOD";
                status.style.background="#FFA500";
                status.style.color="#ffffff";
            }
            if(count == 3)
            {
                status.innerHTML="STRONG";
                status.style.background="#89da59";
                status.style.color="#ffffff";
            }
        }
    }
    </script>

</html>