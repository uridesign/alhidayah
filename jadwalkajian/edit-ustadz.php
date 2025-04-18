<?php
  // Session check login required  
  include('../includes/connection.php');
  include('../includes/session_check.php');

  $page_name = 'jadwalkajian';

  $id=$_REQUEST['id'];
  $query = "SELECT * from ustadz where id='".$id."'"; 
  $result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);

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
          <h1 class="page-title">Edit data Ustadz</h1>
          <div class="row mt-3">
            <div class="col-md-8">
              <?php
                $status = "";
                if(isset($_POST['new']) && $_POST['new']==1){
                  $id       = $_REQUEST['id'];
                  $name     = $_REQUEST['name'];
                  $caption  = $_REQUEST['caption'];

                  $update='update ustadz set name="'.$name.'", 
                  caption="'.$caption.'" where id="'.$id.'"';

                  mysqli_query($conn, $update) or die(mysqli_error($conn));
                  $status = "Record Updated Successfully. </br></br>
                  <a href='./ustadz.php'>Back to manage ustadz</a>";
                  echo '<p style="color:#FF0000;">'.$status.'</p>';
                } else {
              ?>
              <form action="" method="post" class="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['id'];?>" />

                <div class="form-item form-placeholder mb-3">
                  <label class="form-label" for="name">Nama Ustadz</label>
                  <input class="form-control" type="text" name="name" id="name" value="<?php echo $row['name'];?>">
                </div>
                <div class="form-item form-placeholder mb-3">
                  <label class="form-label" for="caption">Caption</label>
                  <textarea class="form-control" name="caption" id="caption" rows="5"><?php echo $row['caption'];?></textarea>
                </div>
                <div class="form-item mt-3">
                  <a href="./ustadz.php" class="btn button-1 _bg-danger">Cancel</a>
                  <button class="btn button-1" type="submit">Submit</button>
                </div>
              </form>
              <?php } ?>
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