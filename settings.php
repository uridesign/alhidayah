<?php
  // Session check login required  
  include('includes/session_check.php');
  
  require('includes/connection.php');
  
  $page_name = 'settings';

  $query = "SELECT * from settings"; 
  $result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title>Masjid Al-Hidayah | Settings</title>
  
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
          <div class="py-3">
            <?php
              $status = "";
              if(isset($_POST['new']) && $_POST['new']==1){
                $tune_hijri   = $_REQUEST['tune_hijri'];
                $tune_fajr    = $_REQUEST['tune_fajr'];
                $tune_dhuhur  = $_REQUEST['tune_dhuhur'];
                $tune_asr     = $_REQUEST['tune_asr'];
                $tune_maghrib = $_REQUEST['tune_maghrib'];
                $tune_isha    = $_REQUEST['tune_isha'];
                $qom_fajr     = $_REQUEST['qom_fajr'];
                $qom_dhuhur   = $_REQUEST['qom_dhuhur'];
                $qom_asr      = $_REQUEST['qom_asr'];
                $qom_maghrib  = $_REQUEST['qom_maghrib'];
                $qom_isha     = $_REQUEST['qom_isha'];
                $dur_azan     = $_REQUEST['dur_azan'];
                $dur_sholat   = $_REQUEST['dur_sholat'];

                $update='update settings set tuneHijri="'.$tune_hijri.'",
                tuneImsak="'.$tune_fajr.'",
                tunefajr="'.$tune_fajr.'", 
                tunedhuhur="'.$tune_dhuhur.'", 
                tuneasr="'.$tune_asr.'",
                tunemaghrib="'.$tune_maghrib.'",
                tuneisha="'.$tune_isha.'",
                qomFajr="'.$qom_fajr.'",
                qomDhuhur="'.$qom_dhuhur.'",
                qomAsr="'.$qom_asr.'",
                qomMaghrib="'.$qom_maghrib.'",
                qomIsha="'.$qom_isha.'",
                durAzan="'.$dur_azan.'",
                durSholat="'.$dur_sholat.'" where 1';
                mysqli_query($conn, $update) or die(mysqli_error($conn));
                $status = "Record Updated Successfully. </br></br>
                <a href='settings.php'>View Updated</a>";
                echo '<p style="color:#FF0000;">'.$status.'</p>';
              } else {
            ?>
              <form name="form" method="post" action=""> 
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="1" />

                <h5 class="mb-4">General Settings</h5>
                <div class="row">
                  <div class="col-lg-8 col-xl-6">
                    <div class="row">
                      <div class="col-12 mb-3">
                        <label class="form-label" for="tune_hijri">Tune Hijri</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_hijri" id="tune_hijri" class="form-control" value="<?php echo $row['tuneHijri'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 mb-3">
                        <label class="form-label" for="dur_azan">Durasi Azan</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="dur_azan" id="dur_azan" class="form-control" value="<?php echo $row['durAzan'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 mb-3">
                        <label class="form-label" for="dur_sholat">Durasi Sholat</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="dur_sholat" id="dur_sholat" class="form-control" value="<?php echo $row['durSholat'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <p>&nbsp;</p>
                
                <h5 class="mb-4">Prayer Settings</h5>
                <div class="row">
                  <div class="col-lg-8 col-xl-6">
                    <div class="row">
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="tune_fajr">Tune Fajr</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_fajr" id="tune_fajr" class="form-control" value="<?php echo $row['tuneFajr'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="qom_fajr">Qomat Fajr</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="qom_fajr" id="qom_fajr" class="form-control" value="<?php echo $row['qomFajr'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="tune_dhuhur">Tune Dhuhur</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_dhuhur" id="tune_dhuhur" class="form-control" value="<?php echo $row['tuneDhuhur'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="qom_dhuhur">Qomat Dhuhur</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="qom_dhuhur" id="qom_dhuhur" class="form-control" value="<?php echo $row['qomDhuhur'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="tune_asr">Tune Asr</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_asr" id="tune_asr" class="form-control" value="<?php echo $row['tuneAsr'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="qom_asr">Qomat Asr</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="qom_asr" id="qom_asr" class="form-control" value="<?php echo $row['qomAsr'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="tune_maghrib">Tune Maghrib</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_maghrib" id="tune_maghrib" class="form-control" value="<?php echo $row['tuneMaghrib'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="qom_maghrib">Qomat Maghrib</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="qom_maghrib" id="qom_maghrib" class="form-control" value="<?php echo $row['qomMaghrib'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="tune_isha">Tune Isha</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="tune_isha" id="tune_isha" class="form-control" value="<?php echo $row['tuneIsha'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="qom_isha">Qomat Isha</label>
                        <div class="panelTuning">
                          <button class="panelTuningMin" type="button">-</button>
                          <input type="text" name="qom_isha" id="qom_isha" class="form-control" value="<?php echo $row['qomIsha'];?>">
                          <button class="panelTuningPlus" type="button">+</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <a href="./index.php" class="btn btn-success button-1" type="submit">Back</a>
                    <button class="btn btn-primary button-1" type="submit">Update</button>
                  </div>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('partials/foot.php');?>
  <script src="js/settings.js"></script>
</body>
</html>