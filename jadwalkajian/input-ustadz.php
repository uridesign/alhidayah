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
          <div class="subpage-menu">
            <ul>
              <li><a href="./"><i class="fa-solid fa-calendar-days"></i>Jadwal Kajian</a></li>
              <li><a href="./input-kajian.php"><i class="fa-solid fa-pen-to-square"></i>Input Kajian</a></li>
              <li><a href="./ustadz.php"><i class="fa-solid fa-user"></i>Manage Ustadz</a></li>
            </ul>
          </div>
          <h1 class="page-title">Daftar Ustadz</h1>
          <div class="row mt-5">
            <div class="col-md-8">
              <form action="./input-ustadz-store.php" class="form">
                <div class="form-item form-placeholder mb-3">
                  <label class="form-label" for="name">Nama Ustadz</label>
                  <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-item form-placeholder mb-3">
                  <label class="form-label" for="caption">Caption</label>
                  <textarea class="form-control" name="caption" id="caption" rows="5"></textarea>
                </div>
                <div class="form-item mb-3">
                  <a href="./ustadz.php" class="btn button-1 _bg-danger">Cancel</a>
                  <button class="btn button-1" type="submit">Submit</button>
                </div>
              </form>
            </div>
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