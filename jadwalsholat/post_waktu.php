<?php
  // Session check login required  
  // include('includes/session_check.php');
  $page_name = "broadcast";

  $botApiToken = '5163636753:AAFfQCA9MAGxLUvZa8ZBhOHTPQNPQ_MyKp4';
  $channelId ='@masjidalhidayahkapuk';
  $text = $_POST['code_tg'];

  $query = http_build_query([
    'chat_id' => $channelId,
    "parse_mode" => "html",
    'disable_notification' => false,
    'text' => $text
  ]);
  $url = "https://api.telegram.org/bot{$botApiToken}/sendMessage?{$query}";

  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => 'GET',
  ));
  curl_exec($curl);
  curl_close($curl);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="Jadwal kajian sunnah Masjid Al-Hidayah, Jl. Batu Bulan No. 27 Kapuk Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Masjid Al-Hidayah">
  <meta property="og:description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta property="og:image" content="https://alhidayah.infodkm.com/images/global/social-logo.jpg">
  <meta property="og:url" content="https://alhidayah.infodkm.com/">
  
  <title>Masjid Al-Hidayah | Share Waktu via Telegram</title>

  <?php include '../partials/head.php';?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Outfit:wght@400;700&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('../partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="top-curve">
        <div class="wrapper">
          <div class="row pt-4 justify-content-center">
            <h1 class="h4">Post Waktu</h1>
          </div>
          <div class="mt-4">
            <p class="h6 fw-normal mb-4">Pesan sudah berhasil disebarkan</p>
            <a class="btn btn-primary" href="./index.php">Kembali</a>
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