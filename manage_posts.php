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
$page_title = "Managing posts";
include "head.php" ?>
<body>
  <!-- header from header.php -->
  <?php
	$img_source = "images/Header_without_ppl.png";
  include "header.php"
  ?>

  <!-- Modify a record begin -->
  <div class="container">
          <!-- <header class="blog-header py-3"> -->
            <div class="blog-header">
              <div class="row flex-nowrap justify-content-between align-items-center">
                  <div class="col-12 text-center">
                      Delete a record in the "Posts" table
                  </div>
              </div>
            </div>
          <!-- </header> -->
  </div>

  <main class="container">

  	<div class="table-responsive" id="posts_list_data"></div>

  </main>
  <!-- Modify a record end -->

	<div class="button-wrapper">
		 <a href="modify_user.php" class="btn btn-secondary mb-3 button-footer center"> Open users info</a>
	</div>

  <!-- footer from footer.html -->
  <?php include "footer.html" ?>
</body>
<?php include "files.php" ?>
  <script src="js/delete_post.js"></script>
</html>
