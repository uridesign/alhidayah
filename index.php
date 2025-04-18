<?php
  // Session check login required  
  include('includes/session_check_nologin.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Masjid Al-Hidayah">
  <meta property="og:description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta property="og:image" content="https://alhidayah.infodkm.com/images/global/social-logo.jpg">
  <meta property="og:url" content="https://alhidayah.infodkm.com/">

  <title>Masjid Al-Hidayah</title>
  
  <?php
    $page_name = 'home';
    include("partials/head.php");
  ?>

</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="top-curve">
        <div class="wrapper">
          <div class="row">
            <div class="col-12 col-md-4 mb-1">
              <a href="./jadwalsholat" class="card-menu" style="background-image: url(images/content/bg-menu-1.jpg);">
                <div>
                  <div><i class="fa-regular fa-clock"></i></div>
                  <h3>Jadwal Sholat</h3>
                </div>
              </a>
            </div>
            <div class="col-12 col-md-4 mb-1">
              <a href="./jadwalkajian" class="card-menu" style="background-image: url(images/content/bg-menu-2.jpg);">
                <div>
                  <div><i class="fa-regular fa-calendar"></i></div>
                  <h3>Jadwal Kajian</h3>
                </div>
              </a>
            </div>
            <div class="col-12 col-md-4">
              <a href="./sitemap" class="card-menu" style="background-image: url(images/content/bg-menu-3.jpg);">
                <div>
                  <div><i class="fa-solid fa-link"></i></div>
                  <h3>Daftar Tautan</h3>
                </div>
              </a>
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