<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check_nologin.php');

  $page_name = 'jadwalkajian';

  $kajian=$_REQUEST['kajian'];

  $query_kajian = "SELECT kajian.id, kajian.title, kajian.date, ustadz.name FROM kajian INNER JOIN ustadz ON ustadz.id = kajian.ustadz_id AND kajian.status=1 ORDER BY date"; 
  $result = $conn->query($query_kajian);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Jl. Batu Bulan No. 27 Kel.Kapuk Kec.Cengkareng Jakarta Barat">
  <meta name="keywords" content="masjid, sunnah, jakarta, barat, cengkareng, kapuk">

  <title>Jadwal Kajian | Masjid Al-Hidayah</title>
  
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
          <?php if ( isset($_SESSION["session_username"]) ) {?>
          <div class="subpage-menu">
            <ul>
              <li><a href="./"><i class="fa-solid fa-calendar-days"></i>Jadwal Kajian</a></li>
              <li><a href="./input-kajian.php"><i class="fa-solid fa-pen-to-square"></i>Input Kajian</a></li>
              <li><a href="./ustadz.php"><i class="fa-solid fa-user"></i>Manage Ustadz</a></li>
            </ul>
          </div>
          <?php } ?>
          <h1 class="page-title">Jadwal Kajian</h1>
          <div class="row mt-4">
            <?php 
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
              
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 mb-lg-4">
                <div class="kajian_card">
                  <div class="top-card">
                    <h2><?php echo $row['title'];?></h2>
                    <h3>Ustadz <?php echo $row['name'];?></h2>
                    <p><?php echo date("d-m-Y",strtotime( $row['date'] ));?></p>
                  </div>
                  <div class="bottom-card">
                    <a href="./broadcast_kajian.php?kajian=<?php echo $row['id']?>" class="btn button-1">Broadcast Kajain</a>
                    <a href="./broadcast_live.php?kajian=<?php echo $row['id']?>" class="btn button-1">Broadcast Live</a>
                    <?php if ( isset($_SESSION["mah_loggedin"]) ) {?>
                      <div class="bottom-panel">
                        <a href="./edit-kajian.php?id=<?php echo $row['id']?>"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="./delete-kajian.php?id=<?php echo $row['id']?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa-regular fa-trash-can" ></i></a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>

            <?php   
                }
              } else {
                echo "<p class='text-center'>0 results</p>";
              }
              $conn->close();
            ?>
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