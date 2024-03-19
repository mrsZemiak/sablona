<?php
include_once "parts/header.php";
?>
<body>
<?php
include_once "parts/nav.php";
?>
  <main>
    <section class="banner">
      <div class="container text-white">
        <h1>Kontakt</h1>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="col-100 text-center">
          <p><strong><em>Elit culpa id mollit irure sit. Ex ut et ea esse culpa officia ea incididunt elit velit veniam qui. Mollit deserunt culpa incididunt laborum commodo in culpa.</em
          ></strong></p>
        </div>
      </div>
    </section>
      <section class="container">
          <div class="row">
              <div class="col-50">
                  <h3>Máte otázky?</h3>
              </div>
              <div class="col-50 text-right">
                  <h3>Napíšte nám</h3>
                  <form id="contact" method="post" action="db/spracovanieFormulara.php">
                      <input type="text" placeholder="Vaše meno" name="meno" id ="meno"  required><br>
                      <input type="email" placeholder="Váš email" name="email" id="email" required><br>
                      <textarea placeholder="Vaša správa" name="sprava" id="sprava"></textarea><br>
                      <input type="checkbox" name="" id="" required>
                      <label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
                      <input type="submit" value="Odoslať">
                  </form>
              </div>
          </div>
      </section>
  </main>
<?php
include_once "parts/footer.php";
?>