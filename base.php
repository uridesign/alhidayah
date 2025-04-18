<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title>HTML source 2.1</title>
  
  <?php
    $page_name = 'base';
    include("partials/head.php");
  ?>

</head>
<body>
  <div id="container">
    <header id="header">
      <?php include('partials/header.php'); ?>
    </header>
    <main id="content">
      <div class="wrapper">
        <p class="text-center">[ .. ]</p>
      </div>
    </main>
    <footer id="footer">
      <?php include('partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('partials/foot.php');?>
</body>
</html>