<?php

  $servername = "localhost";
  $username = "u9400583_yusufri";
  $password = "!x/8V.!GRu-:";
  $dbname = "u9400583_alhidayah";

  // $servername = "localhost";
  // $username = "root";
  // $password = "root";
  // $dbname = "alhidayah";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  date_default_timezone_set('Asia/Jakarta');

?>