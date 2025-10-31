<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["mah_loggedin"]) && $_SESSION["mah_loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "includes/connection.php";
$page_name = 'login';
 
// Define variables and initialize with empty values
$username = $password = "";
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
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      
      // Set parameters
      $param_username = $username;
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);
        
        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){                    
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){
              // Password is correct, so start a new session
              session_start();
              
              // Store data in session variables
              $_SESSION["mah_loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              $cookie_expiration_time = time() + (86400 * 30);
              setcookie("remember_me_token", "some_unique_value", $cookie_expiration_time, "/");

              // Redirect user to welcome page
              if(isset($_SESSION['current_page'])) {
                header('location: ' . $_SESSION['current_page']);
              } else {
                header('location: index.php');
              }
              //echo $_SESSION['current_page'];
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

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }
  
  // Close connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title>Login | Masjid Al-Hidayah</title>
  
  <?php include("partials/head.php"); ?>

</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="top-curve">
        <div class="wrapper">
          <h1 class="page-title">Login</h1>
          <div class="row">
            <div class="col-md-4">
              <p>Please fill in your credentials to login.</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                <div class="form-item form-placeholder mb-3<?php echo (!empty($username_err)) ? ' has-error' : ''; ?>">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                  <div class="form-text text-danger" style="color: red; font-size: .8em; padding-top: 5px"><em><?php echo $username_err; ?></em></div>
                </div>    
                <div class="form-item form-placeholder mb-3<?php echo (!empty($password_err)) ? ' has-error' : ''; ?>">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                  <div class="form-text text-danger" style="color: red; font-size: .8em; padding-top: 5px"><em><?php echo $password_err; ?></em></div>
                </div>
                <input type="submit" class="btn button-1" value="Login">
                <!--p>Don't have an account? <a href="register.php">Sign up now</a>.</p-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('partials/foot.php');?>
</body>
</html>