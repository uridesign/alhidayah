<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check_nologin.php');

  $page_name = 'jadwalkajian';

  $kajian=$_REQUEST['kajian'];

  $query_kajian = "SELECT kajian.title AS kajian_title, kajian.episode, kajian.date, kajian.sholat, kajian.link, ustadz.name AS ustadz_name, ustadz.caption AS ustadz_caption, kitab.name AS kitab_name, masjid.name AS masjid_name, masjid.detail FROM kajian INNER JOIN kitab ON kitab.id = kajian.kitab_id INNER JOIN ustadz ON ustadz.id = kajian.ustadz_id INNER JOIN masjid ON masjid.id = kajian.masjid_id WHERE kajian.id='".$kajian."'"; 
  $result_kajian = mysqli_query($conn, $query_kajian) or die ( mysqli_error($conn));
  $row_kajian = mysqli_fetch_assoc($result_kajian);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">

  <title>Jadwal Kajian | Masjid Al-Hidayah | <?php echo $row_kajian['date']?></title>
  
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
          <div class="pt-t mt-5">
            <a href="./">Back to list</a>
          </div>

          <div class="hidden-area">
            <?php
              $data_settings = mysqli_query($conn,"SELECT * FROM settings");
              while($row = mysqli_fetch_array($data_settings)){
                echo '<div id="tuneHijri">' . $row['tuneHijri'] . '</div>';
              }
            ?>
            <div id="episode"><?php echo $row_kajian['episode'];?></div>
            <div id="time"><?php echo $row_kajian['sholat'];?></div>
          </div>

          <div class="justify-content-center py-5">
            <div class="">
              <h1><span id="title"><?php echo $row_kajian['kajian_title'];?></span></h1>
              <?php if( $row_kajian['episode'] > 1) echo '<p>Episode : '. $row_kajian['episode'] .'</p>' ?>
              <h2 class="h5" style="font-weight: 500"><span id="book"><?php echo 'Kajian ' . $row_kajian['kitab_name']?></span></h2>
              <h3 class="h6" style="font-weight: 600">Ustadz <span id="name"><?php echo $row_kajian['ustadz_name']?></span> حفظه الله</h3>
              <p><em><span id="caption"><?php echo $row_kajian['ustadz_caption'];?></span></em></p>
              <p><span id="date"><?php echo $row_kajian['date']?></span></p>

              <div class="form row">
                <div class="<?php echo ( isset($_SESSION["session_username"]) ) ? 'col-12 mb-3 col-md-6 mb-md-0' : 'col-12' ; ?>">
                  <div class="form-item mb-3">
                    <label class="form-label" for="">Preview Whatsapp</label>
                    <textarea name="code" id="code" class="form-control preview" rows="12" readonly></textarea>
                  </div>
                  <div>
                    <a href="javascript:;" id="copy" class="btn button-1">Copy to WhatsApp</a>
                  </div>
                </div>
                <?php if ( isset($_SESSION["session_username"]) ) {?>
                <div class="col-12 col-md-6">
                    <form id="preview_send_tg" action="./post_kajian.php" method="POST">
                      <div class="form-item mb-3">
                        <label class="form-label" for="">Preview Telegram</label>
                        <textarea name="code_tg" id="code_tg" class="form-control preview" rows="12" readonly></textarea>
                      </div>
                      <div>
                        <button type="submit" class="btn button-1">Send to Telegram</button>
                      </div>
                    </form>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div id="report_message"></div>
          
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('../partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('../partials/foot.php');?>
  <script src="../js/jadwalsholat/moment-locale.min.js"></script>
  <script src="../js/jadwalsholat/moment-hijri.js"></script>
  <script>
    $(document).ready(function(){

      var hijriAdjust = parseInt($('#tuneHijri').text());

      var title = $('#title').text().toUpperCase();
      var episode = $('#episode').text();
      var book = $('#book').text();
      var book_tg;
      var name = $('#name').text();
      var caption = $('#caption').text();
      var caption_tg;
      var date = $('#date').text();
      var time = $('#time').text();

      if ( episode > 1 ) {
        episode = ' [Ep.'+ episode +']';
      } else {
        episode = '';
      };

      if ( caption != '' ) { 
        caption_tg = '<i>'+ caption +'</i><br>';
        caption = '_'+ caption +'_<br>';
      } else {
        caption_tg = '';
        caption = '';
      }

      moment.locale('id',{
        weekdays : "Ahad_Senin_Selasa_Rabu_Kamis_Jum'at_Sabtu".split('_')
      });

      var day_selected = moment(date, 'YYYY/MM/DD hh:mm');

      var day_name = day_selected.format('dddd');
      var date_selected = day_selected.format('DD MMMM YYYY');
      var date_selected_name = day_selected.format('DD MMMM YYYY');

      if(time == '') {
        time = day_selected.format('kk:mm') + ' WIB';
      } else {
        time = "Ba'da Sholat " + time;
      }

      var hj = moment(date).add(hijriAdjust, 'd').format('iD iMMMM iYYYY');

      var copy_text = '*📢 INFO KAJIAN MASJID AL-HIDAYAH*<br><br>'+
      'بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم<br><br>'+
      'Hadirilah Kajian Islam Ilmiah Untuk Umum<br><br>'+
      'In Syaa Allah<br><br>'+
      '_📖 Tema_<br>'+
      '*'+ title +''+ episode +'*<br>'+
      '_['+ book +']_<br><br>'+
      '_👤 Pemateri_<br>'+
      '*Ustadz '+ name +' حفظه الله*<br>'+
      caption +
      '<br>'+
      '_🗓️ Hari/Tanggal_<br>'+
      '*'+ hj +'H*<br>'+
      day_name +', '+ date_selected_name +'<br><br>'+
      '_🕓 Waktu_<br>'+
      '*'+ time +' - Selesai*<br><br>'+
      '_🕌 Tempat_<br>*Masjid Al-Hidayah*<br>'+ 
      'Jl. Batu Bulan No.27 Kapuk Cengkareng Jakarta Barat<br>'+
      'Link lokasi: https://maps.app.goo.gl/bAwDrrUFeu5FJzuS9<br><br>'+
      '_☎ Informasi Lanjut_<br>'+ 
      '081295562662 (Ikhwan)<br>'+ 
      '081219544878 (Akhwat)<br><br>'+
      '_Social Media_<br>'+ 
      'Youtube: https://youtube.com/@masjidalhidayahkapuk<br>'+
      'Instagram: https://instagram.com/masjidalhidayahkapuk<br>'+
      'Facebook: https://facebook.com/masjidalhidayahkapuk<br>'+
      'Website: https://alhidayah.infodkm.com/<br><br>'+
      '==============================<br><br>'+
      '*Donasi Dakwah Masjid Al-Hidayah:*<br>'+
      'Bank Syariah Indonesia<br>'+
      'No rek. 7997998558<br>'+
      'a.n. Masjid Al Hidayah RW 008<br><br>'+
      '==============================<br><br>'+
      '_✒ Mutiara sunnah_<br><br>'+
      "RASULULLAH SHALLALLAAHU 'ALAIHI WA SALLAM bersabda :<br><br>"+
      'مَنْ سَلَكَ طَرِيْقًا يَلْتَمِسُ فِيْهِ عِلْمًا، سَهَّلَ اللهُ لَهُ بِهِ طَرِيْقًا إِلَى الْجَنَّةِ<br><br>'+
      '“Barang siapa yang menempuh suatu jalan untuk menuntut ilmu, Allah akan mudahkan baginya jalan ke surga” (HR. Muslim).<br><br>'+
      '==============================<br><br>'+
      '_DIMOHON TIDAK MELIPUT KAJIAN & TIDAK MENGEDIT VIDEO KAJIAN TANPA SEIZIN PIHAK PANITIA_<br><br>'+
      'Dipersilahkan berbagi informasi ini, Semoga bermanfaat<br>'+
      'Jazaakumullahu Khairan';

      var copy_text_tg = '<b>📢 INFO KAJIAN MASJID AL-HIDAYAH</b><br><br>'+
      'بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم<br><br>'+
      'Hadirilah Kajian Islam Ilmiah Untuk Umum<br><br>'+
      'In Syaa Allah<br><br>'+
      '<i>📖 Tema</i><br>'+
      '<b>'+ title +''+ episode +'</b><br>'+
      '<i>['+ book +']</i><br><br>'+
      '<i>👤 Pemateri</i><br>'+
      '<b>Ustadz '+ name +' حفظه الله</b><br>'+
      caption_tg +
      '<br>'+
      '<i>🗓️ Hari/Tanggal</i><br>'+
      '<b>'+ hj +'H</b><br>'+
      day_name +', '+ date_selected_name +'<br><br>'+
      '<i>🕓 Waktu</i><br>'+
      '<b>'+ time +' - Selesai</b><br><br>'+
      '<i>🕌 Tempat</i><br><b>Masjid Al-Hidayah</b><br>'+ 
      'Jl. Batu Bulan No.27 Kapuk Cengkareng Jakarta Barat<br>'+
      'Link lokasi: https://maps.app.goo.gl/bAwDrrUFeu5FJzuS9<br><br>'+
      '<i>☎ Informasi Lanjut</i><br>'+ 
      '081295562662 (Ikhwan)<br>'+ 
      '081219544878 (Akhwat)<br><br>'+
      '<i>Social Media</i><br>'+ 
      'Youtube: https://youtube.com/@masjidalhidayahkapuk<br>'+
      'Instagram: https://instagram.com/masjidalhidayahkapuk<br>'+
      'Facebook: https://facebook.com/masjidalhidayahkapuk<br>'+
      'Website: https://alhidayah.infodkm.com/<br><br>'+
      '==============================<br><br>'+
      '<b>Donasi Dakwah Masjid Al-Hidayah:</b><br>'+
      'Bank Syariah Indonesia<br>'+
      'No rek. 7997998558<br>'+
      'a.n. Masjid Al Hidayah RW 008<br><br>'+
      '==============================<br><br>'+
      '<i>✒ Mutiara sunnah</i><br><br>'+
      "RASULULLAH SHALLALLAAHU 'ALAIHI WA SALLAM bersabda :<br><br>"+
      'مَنْ سَلَكَ طَرِيْقًا يَلْتَمِسُ فِيْهِ عِلْمًا، سَهَّلَ اللهُ لَهُ بِهِ طَرِيْقًا إِلَى الْجَنَّةِ<br><br>'+
      '“Barang siapa yang menempuh suatu jalan untuk menuntut ilmu, Allah akan mudahkan baginya jalan ke surga” (HR. Muslim).<br><br>'+
      '==============================<br><br>'+
      '<i>DIMOHON TIDAK MELIPUT KAJIAN & TIDAK MENGEDIT VIDEO KAJIAN TANPA SEIZIN PIHAK PANITIA</i><br><br>'+
      'Dipersilahkan berbagi informasi ini, Semoga bermanfaat<br>'+
      'Jazaakumullahu Khairan';

      $('#code').val( copy_text.replace(/&nbsp;/g, ' ').replace(/<br\s*[\/]?>/gi, "\n") );
      $('#code_tg').val( copy_text_tg.replace(/&nbsp;/g, ' ').replace(/<br\s*[\/]?>/gi, "\n") );
      
      function copyFunction() {
        var copyText = document.getElementById("code");
        copyText.select(); 
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        copyText.blur();
        
        $('#report_message').html('<div class="alert alert-success">Copied!!</div>').show().delay(2000).fadeOut();
      }

      $('#copy').click(function(){
        copyFunction();
      });
    });
  </script>
</body>
</html>