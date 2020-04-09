<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $name = "";
$username_err = $password_err = "";


    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){


            
            // Check if username is empty
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter username.";
            } else{
                $username = trim($_POST["username"]);
            }
            
            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["password"]);
            }

        
            // Validate credentials
            if(empty($username_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT userID, username, `name`, eMail, password FROM user WHERE username = ?";
                
                if($stmt = $mysqli->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("s", $param_username);
                    
                    // Set parameters
                    $param_username = $username;
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        // Store result
                        $stmt->store_result();
                        
                        // Check if username exists, if yes then verify password
                        if($stmt->num_rows == 1){                    
                            // Bind result variables
                            $stmt->bind_result($id, $username, $name, $email, $hashed_password);
                            if($stmt->fetch()){
                                if(password_verify($password, $hashed_password)){
                                    // Password is correct, so start a new session
                                    session_start();
                                    
                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["userID"] = $id;
                                    $_SESSION["username"] = $username; 
                                    $_SESSION["email"] = $email; 
                                    $_SESSION["name"] = $name;
                                                      
                                    
                                    // Redirect user to welcome page
                                    header("location: welcome.php");
                                } else{
                                    // Display an error message if password is not valid
                                    $password_err = "The password you entered was not valid.";
                                }
                            }
                        } else{
                            // Display an error message if username doesn't exist
                            $username_err = "No account found with that username.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                
                // Close statement
                $stmt->close();
            }
        
        // Close connection <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">pod rel stylesheet
        $mysqli->close();
    }
?>

<!DOCTYPE html>
<html amp >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/alphabet-1896957-640-90x94.png" type="image/x-icon">
  <meta name="description" content="">
  <link rel="stylesheet" href="stylesheet.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
  
  <title>Log in</title>
  
<link rel="canonical" href="page1.html">
 
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
        
            
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            
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
                  <a href="index1.php"></a>
              </amp-img>
          </span>
          <p class="brand-name mbr-fonts-style mbr-bold display-5"><a href="index1.php" class="text-white">Websy</a></p>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
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
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="view/registerView.php">Sign up now</a>.</p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        </form>
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
</html>