<?php
  
  include('../includes/connection.php');
  include('../includes/session_check_nologin.php');
  
  $page_name = 'jadwalsholat';
?>

<!DOCTYPE html>
<html lang="en" class="home">
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
  
  <title>Jadwal Sholat | Masjid Al-Hidayah</title>

  <?php include '../partials/head.php';?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Outfit:wght@400;700&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

  <script src="../js/jadwalsholat/PrayTimes.js"></script>
  <!--script src="scripts/HijriDate.js"></script-->
  <script src="../js/jadwalsholat/moment-locale.min.js"></script>
  <script src="../js/jadwalsholat/moment-hijri.js"></script>
</head>
<body class="alhidayah">
  <div id="container" class="container-fluid">
    <div class="body-top row align-items-center align-items-md-start align-items-xxl-center">
      <div class="logo col-12 col-md-8 order-md-1 col-xxl-6">
        <div class="row gx-0 gx-lg-3 align-items-center">
          <div class="col-3 col-sm-3 offset-sm-2 col-md-3 offset-md-0 ps-md-0">
            <a href="<?php echo $baseurl; ?>"><img width="200px" src="../images/global/logo.png" alt=""></a>
          </div>
          <div class="col col-sm-auto col-md-9 ps-2 ps-md-0">
            <h1><span class="color-2">Masjid</span> Al-Hidayah</h1>
            <h3>Jl. Batu Bulan No. 27</h3>
            <h3>Kec. Cengkareng Kel. Kapuk Jakarta Barat</h3>
          </div>
        </div>
      </div>
      <div class="day col-6 col-md-4 order-md-0 col-xxl-3">
        <span id="day"></span>
        <span id="date"></span>
        <span id="hidjriDate" class="color-2"></span>
      </div>
      <div class="hour font-3 col-6 col-md-4 order-md-3 col-xxl-3">
        <span id="clock">00:00:00</span>
      </div>
    </div>
    <div class="body-center">
      <div id="report_message"></div>
    </div>
    <div class="body-bottom">
      <div class="upcoming-prayer">
        <span id="to_prayer"></span> - <span id="counter" class="font-3">00:00:00</span>
      </div>
      <div class="prayer-schedule">
        <div class="prayer-schedule-item psi-imsak">
          <div class="title">Imsak</div>
          <div id="t_imsak" class="time font-2">00:00</div>
        </div>
        <div class="prayer-schedule-item psi-subuh">
          <div class="title">Subuh</div>
          <div id="t_subuh" class="time font-2">00:00</div>
        </div>
        <div class="prayer-schedule-item psi-zuhur">
          <div class="title">Zuhur</div>
          <div id="t_zuhur" class="time font-2">00:00</div>
        </div>
        <div class="prayer-schedule-item psi-asar">
          <div class="title">Asar</div>
          <div id="t_asar" class="time font-2">00:00</div>
        </div>
        <div class="prayer-schedule-item psi-magrib">
          <div class="title">Magrib</div>
          <div id="t_magrib" class="time font-2">00:00</div>
        </div>
        <div class="prayer-schedule-item psi-isya">
          <div class="title">Isya</div>
          <div id="t_isya" class="time font-2">00:00</div>
        </div>
      </div>
      <div id="mobile_button" class="text-center py-2">
        <a href="javascript:;" id="copy" class="btn btn-primary mr-2">Salin ke WhatsApp</a>
        <?php
          if( isset($_SESSION["session_username"]) ) {
        ?>
        <form id="preview_send_tg" action="post_waktu.php" method="POST" style="display: inline;">
          <textarea name="code_tg" id="code_tg" class="form-control hide"></textarea>
          <button type="submit" class="btn btn-success">Send to Telegram</button>
        </form>
        <?php
          }
        ?>
      </div>
      <div class="running-text">
        <div class="running-text-wrap">
          <!-- <strong>Saldo saat ini</strong> Rp. 450.000.000 -->
          <span class="animate1">
            <strong>Info</strong>
            <span class="divider"></span>
            <strong>Pengajian Rutin</strong> Ahad pekan ke-1 (Ba'da Sholat Subuh) "Kutaib Al-Wajibat" oleh <em>Ustadz Aldhi Ferdian, Lc.</em> <span>|</span> Sabtu pekan ke-2 (Ba'da Sholat Subuh) "Kitab Sirah Nabawiyah" oleh <em>Ustadz Yudi Kurnia, Lc.</em> <span>|</span> Ahad pekan ke-3 (Ba'da Sholat Ashar) "Kitab Minhajul Muslim" oleh <em>Ustadz Abu Hurairah, MA.</em> <span>|</span> Sabtu pekan ke-4 (Ba'da Sholat Subuh) "Kitab Sifat Sholat Nabi" oleh <em>Ustadz Muhammad Maftuh Sani, Lc., MA.</em>&nbsp;&nbsp;&nbsp;
          </span>
          <span class="animate2">
            <strong>Info</strong>
            <span class="divider"></span>
            <strong>Pengajian Rutin</strong> Ahad pekan ke-1 (Ba'da Sholat Subuh) "Kutaib Al-Wajibat" oleh <em>Ustadz Aldhi Ferdian, Lc.</em> <span>|</span> Sabtu pekan ke-2 (Ba'da Sholat Subuh) "Kitab Sirah Nabawiyah" oleh <em>Ustadz Yudi Kurnia, Lc.</em> <span>|</span> Ahad pekan ke-3 (Ba'da Sholat Ashar) "Kitab Minhajul Muslim" oleh <em>Ustadz Abu Hurairah, MA.</em> <span>|</span> Sabtu pekan ke-4 (Ba'da Sholat Subuh) "Kitab Sifat Sholat Nabi" oleh <em>Ustadz Muhammad Maftuh Sani, Lc., MA.</em>&nbsp;&nbsp;&nbsp;
          </span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="hidden_area">
    <div class="hidden_form">
      <div class="mb-3">
        <textarea class="form-control" id="code"></textarea>
      </div> 
    </div>
    <?php
      $data_settings = mysqli_query($conn,"select * from settings");
      while($row = mysqli_fetch_array($data_settings)){

        echo '<div id="tuneHijri">' . $row['tuneHijri'] . '</div>';
        echo '<div id="tuneImsak">' . $row['tuneImsak'] . '</div>';
        echo '<div id="tuneFajr">' . $row['tuneFajr'] . '</div>';
        echo '<div id="tuneDhuhur">' . $row['tuneDhuhur'] . '</div>';
        echo '<div id="tuneAsr">' . $row['tuneAsr'] . '</div>';
        echo '<div id="tuneMaghrib">' . $row['tuneMaghrib'] . '</div>';
        echo '<div id="tuneIsha">' . $row['tuneIsha'] . '</div>';
        echo '<div id="qomFajr">' . $row['qomFajr'] . '</div>';
        echo '<div id="qomDhuhur">' . $row['qomDhuhur'] . '</div>';
        echo '<div id="qomAsr">' . $row['qomAsr'] . '</div>';
        echo '<div id="qomMaghrib">' . $row['qomMaghrib'] . '</div>';
        echo '<div id="qomIsha">' . $row['qomIsha'] . '</div>';
        echo '<div id="durAzan">' . $row['durAzan'] . '</div>';
        echo '<div id="durSholat">' . $row['durSholat'] . '</div>';

      }
    ?>
  </div>

  <div id="modal_azan" class="modal">
    <div class="modal-wrap">
      <div>
        Anda memasuki waktu <span id="azan_time"></span>
        <div class="progress_bar">
          <div class="progress_bar-loader"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_iqomah" class="modal">
    <div class="modal-wrap">
      <div>
        Jeda waktu iqomah
        <span id="iqomah_countdown">00:00</span>
      </div>
    </div>
  </div>

  <div id="modal_sholat" class="modal">
    <div class="modal-wrap">
      <div>
        <h1>ﷲ</h1>
      </div>
    </div>
  </div>

  <div class="overlay"></div>
  
  <div class="d-none">
    <button onclick="playAudio1()" id="playAudio1" type="button">Play Audio</button>
    <button onclick="playAudio2()" id="playAudio2" type="button">Play Audio</button>

    <audio id="audio1" controls>
      <source src="../audio/beep-short.mp3" type="audio/mp3">
      Your browser does not support the audio element.
    </audio>
    <audio id="audio2" controls>
      <source src="../audio/beep-long.mp3" type="audio/mp3">
      Your browser does not support the audio element.
    </audio>
  </div>

  <!-- <script src="//mjm.yusufrivai.com/hijriVar.js"></script> -->
  <script src="../js/jadwalsholat/jadwal_imam.js"></script>
  <script>
    $(document).ready(function(){
      // hijriVar = hijriVar.adjustDate;

      hijriVar = parseInt($('#tuneHijri').text());

      var v_tuneImsak = parseInt($('#tuneImsak').text());
      var v_tuneFajr = parseInt($('#tuneFajr').text());
      var v_tuneDhuhur = parseInt($('#tuneDhuhur').text());
      var v_tuneAsr = parseInt($('#tuneAsr').text());
      var v_tuneMaghrib = parseInt($('#tuneMaghrib').text());
      var v_tuneIsha = parseInt($('#tuneIsha').text());
      var v_qomFajr = parseInt($('#qomFajr').text());
      var v_qomDhuhur = parseInt($('#qomDhuhur').text());
      var v_qomAsr = parseInt($('#qomAsr').text());
      var v_qomMaghrib = parseInt($('#qomMaghrib').text());
      var v_qomIsha = parseInt($('#qomIsha').text());
      var v_durAzan = parseInt($('#durAzan').text());
      var v_durSholat = parseInt($('#durSholat').text());
      
      jadwalsholat({
        adjustHijri         : hijriVar,
        tuneImsak           : v_tuneImsak,
        tuneFajr            : v_tuneFajr,
        tuneDhuhr           : v_tuneDhuhur,
        tuneAsr             : v_tuneAsr,
        tuneMaghrib         : v_tuneMaghrib,
        tuneIsha            : v_tuneIsha,
        durasiQomatFajr 	  : v_qomFajr,
        durasiQomatDhuhur 	: v_qomDhuhur,
        durasiQomatAsr   	  : v_qomAsr,
        durasiQomatMaghrib	: v_qomMaghrib,
        durasiQomatIsha 	  : v_qomIsha,
        durasiAzan 				  : v_durAzan,
        durasiSholat 			  : v_durSholat
      });
    });
  </script>
</body>
</html>