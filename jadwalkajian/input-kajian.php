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
          <h1 class="page-title">Input Jadwal Kajian</h1>
          <div class="row mt-5">
            <div class="col-md-8">
              <form action="./input-kajian-store.php" class="form">
                <div class="row">
                  <div class="form-item form-placeholder form-placeholder-disabled col-12 col-md-6 mb-3">
                    <label class="form-label" for="date">Date</label>
                    <input class="form-control datepicker" type="text" name="date" id="date">
                  </div>
                  <div class="form-item form-placeholder-select form-placeholder-disabled col-12 col-md-6 mb-3">
                    <label class="form-label" for="time">Ba'da Sholat</label>
                    <select class="form-control-select" name="time" id="time">
                      <option value="">- Lewati jika menggunakan jam -</option>
                      <option value="Subuh">Ba'da Sholat Subuh</option>
                      <option value="Dzuhur">Ba'da Sholat Dzuhur</option>
                      <option value="Ashar">Ba'da Sholat Ashar</option>
                      <option value="Maghrib">Ba'da Sholat Maghrib</option>
                      <option value="Isya">Ba'da Sholat Isya</option>
                    </select>
                  </div>
                  <div class="form-item form-placeholder col-12 col-md-6 mb-3">
                    <label class="form-label" for="title">Judul Kajian</label>
                    <input class="form-control" type="text" name="title" id="title">
                  </div>
                  <div class="form-item form-placeholder col-12 col-md-6 mb-3">
                    <label class="form-label" for="episode">Episode</label>
                    <input class="form-control" type="text" name="episode" id="episode" value="1">
                  </div>
                  <div class="form-item form-placeholder-select col-12 col-md-6 mb-3">
                    <label class="form-label" for="book">Nama Kitab</label>
                    <select class="form-control-select" name="book" id="book">
                      <option value="">- Nama Kitab -</option>
                      <?php
                        $query_kitab = "SELECT * FROM kitab"; 
                        $result = $conn->query($query_kitab);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row_kitab = $result->fetch_assoc()) {
                            echo '<option value="'. $row_kitab['id'] .'">'. $row_kitab['name'] .'</option>';
                          }
                        }
                      ?>
                      
                    </select>
                  </div>
                  <div class="form-item form-placeholder-select col-12 col-md-6 mb-3">
                    <label class="form-label" for="name">Nama Ustadz</label>
                    <select class="form-control-select" name="name" id="name">
                      <option value="">- Nama Ustadz -</option>
                      <?php
                        $query_ustadz = "SELECT * FROM ustadz"; 
                        $result = $conn->query($query_ustadz);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row_ustadz = $result->fetch_assoc()) {
                            echo '<option value="'. $row_ustadz['id'] .'">'. $row_ustadz['name'] .'</option>';
                          }
                        }
                      ?>
                      
                    </select>
                  </div>
                  <div class="form-item form-placeholder col-12 col-md-12 mb-3">
                    <label class="form-label" for="link">Link Kajian</label>
                    <input class="form-control" type="text" name="link" id="link">
                  </div>
                  <div class="form-item col-12 col-md-12 mt-3">
                    <button class="btn button-1" type="submit">Submit</button>
                  </div>
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