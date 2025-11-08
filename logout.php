<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
// $_SESSION = array();
// session_unset();

$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";
 
// Destroy the session.
session_destroy();

// reset cookie
$cookie_name = "cookie_username";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");

$cookie_name = "cookie_password";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");
 
// Redirect to login page
header("location: ./index.php");
exit;
?>