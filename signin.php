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
$page_title = "Sign in";
include "head.php" ?>
<body>
  <!-- header from header.html -->
  <?php
	$img_source = "images/HeaderTop.png";
  include "header.php"
  ?>


<!-- Login form from Rent a car begin -->
<!-- New login form begin -->

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
      } else {
      ?>

  <div id="borderForm" class="container pt-3 row justify-content-center">
    <h2 class="container pt-3 row justify-content-center">Log in</h2>
    <div class="details">
      <!--a ‘Log in’ form begin-->
      <form id="questions" class="login_form" name="questions" onsubmit="return(validate());" action="">
        <div class="form-group">
                <div id="message" class="alert alert-danger mt-1 d-none align-middle text-center"></div>
        </div>

        <!-- Bootstrap class "form-group" for a form and "form-control" for elements -->

        <!-- Email -->
        <div class="form-group row">
					<!-- text-md-right -->
          <label class="control-label col-md-3" for="email">Email</label>

          <!-- <div class="col-sm-10 col-md-7 col-lg-5"> -->
            <input type="text" class="form-control " id="email" name="email">
            <div id="email_warning_message" class="text-danger mt-1 d-none"></div>
          <!-- </div> -->
        </div>
        <!-- Password -->
        <div class="form-group row">
          <label class="control-label col-md-3" for="password">Password</label>
          <!-- <div class="col-sm-10 col-md-7 col-lg-5" > -->
            <input type="text" class="form-control" id="password" name="password">
            <div id="password_warning_message" class="text-danger mt-1 d-none"></div>
          <!-- </div> -->
        </div>

        <!-- Captcha -->
				<div class="form-group row">
					<!-- <div class="card-body"> -->
					<div class="g-recaptcha mt-7" data-sitekey="6LdbCs8UAAAAAPl4LWXf19APgpiCqHS7zW6U9zwC"></div>
				<!-- </div> -->
        </div>
        <!-- <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div> -->

        <!-- <div class="col-md-6 offset-md-4"> -->

        <!-- <div class="form-group"> -->
        <div class="col-md-10 offset-md-1">
                  <button type="button" id="submit_login" class="btn btn-block  btn-secondary  btn-md">
                    Login
                  </button>
        </div>
        <!-- </div> -->

      </div>
    </div>

    </form>



    <!--a ‘Log in’ form end-->
  </div>


    <?php
    }
    ?>

</main>


<!-- Login form from Rent a car end -->



  <!-- footer from footer.html -->
  <?php include "footer.html" ?>


</body>
  <?php include "files.php" ?>

</html>
