
<?php include_once "parts/header.php"?>
<?php include_once "parts/nav.php"?>
    <main>
      <section class="slides-container">
          <?php
          generateSlides("img/banners");
        ?>

      </section>
      <section class="container">
        <div class="row">
          <div class="col-100 text-center">
              <?php
              pridajPozdrav();
              ?>
          </div>
        </div>
      </section>
      <section class="container">
        <?php include_once "parts/body.php"?>
      </section>
    </main>
    
  <?php
  $file_path = "parts/footer.php";
 if(!include_once($file_path)) {
     echo"Failed to include $file_path";
}
 ?>
    <script src="js/menu.js"></script>
    <script src="js/slider.js"></script>
</body>
</html>

