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
$page_title = "Admin";
include "head.php" ?>
<body>
  <!-- header from header.html -->
  <?php
	$img_source = "images/Header_without_ppl.png";
  include "header.php"
  ?>

  <div class="container">
    <div>

        <?php
          if (isset($_SESSION['user_id'])) {

            echo "

            <div class='container'>
              <div class='row'>
                <div class='col-8'>
                  <h4 >
                    Current user: ".$_SESSION['fullname']."<br><br>
                    Role: ".$_SESSION['role']."<br><br>
                    Notes: ".$_SESSION['notes']."<br>
                  </h4>
                </div>
                <div class='col-4'>

                </div>
              </div>
             </div>

            ";
          }
        ?>
     </div>
  </div>

  <main class="container">

        <?php
        if (isset($_SESSION['role_id'])) {
        ?>

          <div class="row justify-content-center">
            <div class="col-md-2">
              <div class="card-body">
                <button type="button" id="submit_logout" class="btn btn-primary">
                  Logout
                </button>
              </div>
            </div>
          </div>

          <?php
          }
          ?>
</main>
  <!-- footer from header.html -->
  <?php include "footer.html" ?>


</body>
  <?php include "files.php" ?>

</html>
