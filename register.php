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
$page_title = "Register";
include "head.php" ?>

  <body>
		<!-- header from header.html -->
	  <?php
		$img_source = "images/HeaderTop2.png";
	  include "header.php"
	  ?>

		<!-- <div class="container">
		        <header class="blog-header py-3">
		            <div class="row flex-nowrap justify-content-between align-items-center">
		                <div class="col-12 text-center">
		                    <a class="blog-header-logo text-dark">Registration</a>
		                </div>
		            </div>
		        </header>
		</div> -->

		<article class="container">
			<section class="row centered-content" style="justify-content: center">
				<div class="section-heading">
					<h1>Registration</h1>
				</div>
			</section>
		</article>

		<main class="container">

		    <div class="row justify-content-center">
		        <div class="col-md-10">
		            <div class="card-body">
		                <form class="car_action_form">

		                    <div class="form-group">
		                        <div id="message" class="alert alert-danger mt-1 d-none align-middle text-center"></div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="fullname" class="col-md-4 col-form-label text-md-right">Full name</label>
		                        <div class="col-md-6">
		                            <input type="text" id="fullname" class="form-control" name="fullname" value="<?=$myrow['fullname'];?>">
		                            <div id="fullname_warning_message" class="text-danger mt-1 d-none"></div>
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
		                        <div class="col-md-6">
		                            <input type="text" id="email" class="form-control" name="email" value="<?=$myrow['email'];?>">
		                            <div id="email_warning_message" class="text-danger mt-1 d-none"></div>
		                        </div>
		                    </div>

												<div class="form-group row">
		                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
		                        <div class="col-md-6">
		                            <input type="text" id="password" class="form-control" name="password" value="<?=$myrow['password'];?>">
		                            <div id="password_warning_message" class="text-danger mt-1 d-none"></div>
		                        </div>
		                    </div>

		                    <div class="col-md-6 offset-md-4">
		                        <button type="button" class="btn btn-success new_user">
		                           Submit
		                        </button>
		                    </div>

		                </form>
		            </div>
		        </div>
		    </div>

		</main>

    <!-- footer from header.html -->
    <?php include "footer.html" ?>

  </body>
  <?php include "files.php" ?>
	<script src="js/add_user.js"></script>
</html>
