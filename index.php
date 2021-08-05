<?php
/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
?>

<?php
	session_start();
   include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";
?>

<!DOCTYPE html>
<html>

<?php
$page_title = "My Friend Can Do";
include "head.php" ?>

  <body>
    <div class="page-wrap">

      <!-- header from header.html -->
      <?php
      $img_source = "images/HeaderTop.png";
      include "header.php"
      ?>

      <article class="container">
        <section class="row centered-content">
          <div class="section-heading">
						<h1>Where people help</h1>
          </div>
          <div class="content">
            <h2>Want to recommend a friend?</h2>
            <p>
              Registering with My Friend Can Do will allow you to access
              to recommend a friend as a service provider and see users near your.
            </p>
            <p>
              To register, please use the link below.
            </p>
            <p>
              <a href="register.php">Register as an individual</a>
            </p>
            <h2>
              Are you a Professional wanting to help others and get reviews and recommendations on
              My Friend Can Do?
            </h2>
            <p>Ask your friend to recommend you.</p>
            <h2>
              Are you a certified Company interested in having your
              service profiled on My Friend Can Do?
            </h2>
            <p>
              If you a certified Company interested in profiling yourself and your services on
              My Friend Can Do please email Natalia Iudina
              <a href="mailto:nat@mfcd.co.nz">nat@mfcd.co.nz</a>
            </p>
          </div>
        </section>
      </article>
    </div>

    <!-- footer from header.html -->
    <?php include "footer.html" ?>

  </body>
</html>
