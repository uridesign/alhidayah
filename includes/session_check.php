<?php
  // Initialize the session
  session_start();  
  
  $time = 1;
  $logout = "login.php";

  $timeout = $time * 24 * 60 * 60; // menit ke jam
  
  // if(isset($_SESSION['start_session'])){
  //   $elapsed_time = time()-$_SESSION['start_session'];
  //   if($elapsed_time >= $timeout){
  //     session_destroy();
  //     header("location: http://localhost:8888/html/uri/alhidayah/login.php");
  //     // header("location: https://alhidayah.infodkm.com/login.php");
  //   }
  // }

  // $_SESSION['start_session']=time();

  // // Check if the user is logged in, if not then redirect him to login page
  // if(!isset($_SESSION["mah_loggedin"]) || $_SESSION["mah_loggedin"] !== true){
  //   $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
  //   header("location: http://localhost:8888/html/uri/alhidayah/login.php");
  //   // header("location: https://alhidayah.infodkm.com/login.php");
  //   exit;
  // }

  if(!isset($_SESSION['mah_loggedin'])) {
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    // header("location: http://localhost:8888/html/uri/alhidayah/login.php");
    header("location: https://alhidayah.infodkm.com/login.php");
    exit;
  }
?>