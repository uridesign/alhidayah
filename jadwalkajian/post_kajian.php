<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check_nologin.php');

  $page_name = 'jadwalkajian';

  $botApiToken = '5163636753:AAFfQCA9MAGxLUvZa8ZBhOHTPQNPQ_MyKp4';
  $channelId ='@masjidalhidayahkapuk';
  $message = $_POST['code_tg'];

  $query = http_build_query([
    'chat_id' => $channelId,
    "parse_mode" => "html",
    'disable_notification' => false,
    'text' => $message
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
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">

  <title>Share jadwal Telegram | Masjid Al-Hidayah</title>
  
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
          
          <h1 class="h2 mb-5">Post Kajian</h1>
          <div class="mt-4">
            <p class="h6 fw-normal mb-4">Pesan sudah berhasil disebarkan</p>
            <a class="btn btn-primary" href="./">Kembali</a>
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