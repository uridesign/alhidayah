<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check.php');

  $page_name = 'jadwalkajian';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">

  <title>Input Ustadz | Masjid Al-Hidayah</title>
  
  <?php include("../partials/head.php");?>

  <link rel="stylesheet" href="../css/fontawesome-6.7.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/fontawesome-6.7.2/css/solid.min.css">

</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('../partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="top-curve">
        <div class="wrapper">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <?php
                $name    = mysqli_real_escape_string($conn, $_REQUEST['name']);
                $caption  = mysqli_real_escape_string($conn, $_REQUEST['caption']);

                $sql = "INSERT INTO ustadz (name, caption ) VALUES ('$name', '$caption')";

                if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
              ?>
            </div>
          </div>
          <div class="mt-3">
            <a href="./ustadz.php" class="btn button-1">Back</a>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('../partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('../partials/foot.php');?>
</body>
</html>