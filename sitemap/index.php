<?php
  // Session check login required  
  include('../includes/session_check_nologin.php');

  $page_name = 'sitemap';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title>Daftar Tautan | Masjid Al-Hidayah</title>
  <meta property="og:type" content="website">
  <meta property="og:title" content="Masjid Al-Hidayah">
  <meta property="og:description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta property="og:image" content="https://alhidayah.infodkm.com/images/global/social-logo.jpg">
  <meta property="og:url" content="https://alhidayah.infodkm.com/">
  
  <?php include("../partials/head.php");?>

</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('../partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="top-curve">
        <div class="wrapper">
          <div class="sitemap-list">
            <div>
              <a href="https://maps.app.goo.gl/bAwDrrUFeu5FJzuS9" target="_blank">
                <i class="fa-solid fa-location-dot"></i> Lokasi
              </a>
            </div>
            <div>
              <a href="https://whatsapp.com/channel/0029VbAOUQo1t90XT2TMPJ09" target="_blank">
                <i class="fa-brands fa-whatsapp"></i> Whatsapp Channel
              </a>
            </div>
            <div>
              <a href="https://wa.me/6281295562662" target="_blank">
                <i class="fa-brands fa-whatsapp"></i> Admin Ikhwan
              </a>
            </div>
            <div>
              <a href="https://wa.me/6281219544878" target="_blank">
                <i class="fa-brands fa-whatsapp"></i> Admin Akhwat
              </a>
            </div>
            <div>
              <a href="https://www.youtube.com/@masjidalhidayahkapuk" target="_blank">
                <i class="fa-brands fa-youtube"></i> Youtube
              </a>
            </div>
            <div>
              <a href="http://instagram.com/masjidalhidayahkapuk/" target="_blank">
                <i class="fa-brands fa-instagram"></i> Instagram
              </a>
            </div>
            <div>
              <a href="https://www.facebook.com/masjidalhidayahkapuk/" target="_blank">
                <i class="fa-brands fa-facebook-f"></i> Facebook
              </a>
            </div>
            <div>
              <a href="https://t.me/masjidalhidayahkapuk" target="_blank">
                <i class="fa-brands fa-telegram"></i> Telegram
              </a>
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