<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check.php');

  $page_name = 'jadwalkajian';

  $kajian=$_REQUEST['kajian'];

  $query_kajian = "SELECT * FROM ustadz ORDER BY name"; 
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

  <title>Daftar Ustadz | Masjid Al-Hidayah</title>
  
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
          <?php if ( isset($_SESSION["session_username"]) ) {?>
            <p class="my-5 text-md-end"><a class="button-1" href="./input-ustadz.php">+ Tambah Ustadz</a></p>
          <?php } ?>
          <table class="data_list">
            <thead>
              <tr class="dtl-header">
                <th>Nama ustadz</th>
                <?php if ( isset($_SESSION["session_username"]) ) {?>
                  <th>Action</th>  
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php 
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
              ?>
              
              <tr class="dtl-item">
                <td class="dtl-col">
                  <p><strong>Ustadz <?php echo $row['name'];?></strong></p>
                  <p><small><em><?php echo $row['caption'];?></em></small></p>
                </td>
                <?php if ( isset($_SESSION["session_username"]) ) {?>
                  <td class="dtl-action">
                    <a class="link-edit" href="./edit-ustadz.php?id=<?php echo $row['id']?>" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a class="link-delete" href="./delete-ustadz.php?id=<?php echo $row['id']?>" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa-regular fa-trash-can" ></i></a>
                  </td>
                <?php } ?>
              </tr>

              <?php
                  }
                } else {
                  echo "<p class='text-center'>0 results</p>";
                }
                $conn->close();
              ?>
            </tbody>
          </table>
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