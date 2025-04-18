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

  <title>Input Kajian | Masjid Al-Hidayah</title>
  
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
          <div class="subpage-menu">
            <ul>
              <li><a href="./"><i class="fa-solid fa-calendar-days"></i>Jadwal Kajian</a></li>
              <li><a href="./input-kajian.php"><i class="fa-solid fa-pen-to-square"></i>Input Kajian</a></li>
              <li><a href="./ustadz.php"><i class="fa-solid fa-user"></i>Manage Ustadz</a></li>
            </ul>
          </div>
          <h1 class="page-title">Jadwal Kajian</h1>
          <div class="row justify-content-center">
            <div class="col-md-8">
              <?php
                $date     = mysqli_real_escape_string($conn, $_REQUEST['date']);
                $time     = mysqli_real_escape_string($conn, $_REQUEST['time']);
                $title    = mysqli_real_escape_string($conn, $_REQUEST['title']);
                $episode  = mysqli_real_escape_string($conn, $_REQUEST['episode']);
                $book     = mysqli_real_escape_string($conn, $_REQUEST['book']);
                $name     = mysqli_real_escape_string($conn, $_REQUEST['name']);
                $link     = mysqli_real_escape_string($conn, $_REQUEST['link']);

                $sql = "INSERT INTO kajian (date, sholat, title, episode, link, status, masjid_id, ustadz_id, kitab_id ) VALUES ('$date', '$time', '$title', '$episode', '$link', 1, 1, $name, $book)";

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
            <a href="./" class="btn button-1">Back</a>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('../partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('../partials/foot.php');?>
  <!-- Datepicker -->
  <link rel="stylesheet" href="../js/datepicker/bootstrap.css">
  <script src="../js/datepicker/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../js/datepicker/bootstrap-datetimepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
  <script src="../js/datepicker/bootstrap-datetimepicker.min.js"></script>

  <script>
    $(function () {
      var d = new Date();
      d.setHours(d.getHours(), 0, 0);
      $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        defaultDate: d,
        icons: {
          time: 'far fa-clock'
        }
      });
    });
  </script>
</body>
</html>