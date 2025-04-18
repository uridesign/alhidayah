<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title>HTML source 2.1</title>
  
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
      <div class="banner mb-3">
        <div class="banner-bg" style="background-image: url(images/sample/mountains-1381992.jpg);">
          <div class="wrapper">
            <div class="banner-wrap banner-h-image">
              <div class="banner-image">
                <img src="https://via.placeholder.com/768x480.png" alt="">
              </div>
              <div class="banner-text">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi ducimus necessitatibus repudiandae non accusamus! Dignissimos porro quis facilis, voluptas culpa quae adipisci quos reiciendis fugit iste vitae accusamus beatae nobis quas minima qui neque, fugiat earum asperiores? Quasi optio, eveniet voluptatibus illo, beatae ex magni, libero distinctio quas quo eius!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner mb-3">
        <div class="banner-bg" style="background-image: url(images/sample/mountains-1381992.jpg);">
          <div class="wrapper">
            <div class="banner-wrap banner-h-image banner-h-reverse">
              <div class="banner-image">
                <img src="https://via.placeholder.com/768x480.png" alt="">
              </div>
              <div class="banner-text">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi ducimus necessitatibus repudiandae non accusamus! Dignissimos porro quis facilis, voluptas culpa quae adipisci quos reiciendis fugit iste vitae accusamus beatae nobis quas minima qui neque, fugiat earum asperiores? Quasi optio, eveniet voluptatibus illo, beatae ex magni, libero distinctio quas quo eius!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner mb-3">
        <div class="banner-bg" style="background-image: url(images/sample/mountains-1381992.jpg);">
          <div class="wrapper">
            <div class="banner-wrap banner-c">
              <div class="banner-text">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi ducimus necessitatibus repudiandae non accusamus! Dignissimos porro quis facilis, voluptas culpa quae adipisci quos reiciendis fugit iste vitae accusamus beatae nobis quas minima qui neque, fugiat earum asperiores? Quasi optio, eveniet voluptatibus illo, beatae ex magni, libero distinctio quas quo eius!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner mb-3">
        <div class="banner-bg" style="background-image: url(images/sample/mountains-1381992.jpg);">
          <div class="wrapper">
            <div class="banner-wrap banner-c">
              <div class="banner-image">
                <img src="https://via.placeholder.com/768x280.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php include('partials/footer.php'); ?>
    </footer>
  </div>
  <?php include('partials/foot.php');?>
</body>
</html>