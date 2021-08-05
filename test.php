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

<html lang="en">
<?php
$page_title = "Add post";
include "head.php" ?>

<script>
    document.addEventListener("DOMContentLoaded",function(){
  document.all.addFoto.addEventListener("click",function(){
     var el = document.createElement("input");
     el.name = "foto[]";
     el.type = "file";
     el.accept="image/*";
  	document.all.addBtn.appendChild(el)
  });
});
    </script>
    <style>
    /* label,input{
  display:block;
  margin-top:10px;
} */
    </style>

<body>
  <?php
	$img_source = "images/HeaderTop2.png";
  include "header.php"
  ?>
    <div class="container">
      <div class="row-10">


  <form action="posts.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	<label >Title<input type="text" name="title" class="form-control"></label>

  <!-- <label >Description<input type="text" name="description"></label> -->
  <label style="display:block" class="mt-2">Description</label>
  <textarea class="form-control" name="description" rows="8" cols="80" style="margin-top:10px; height: 100px; "></textarea>

  <!-- doesn't work -->
  <input type="button" id="addFoto" value="Add image" class="btn btn-info my-2">

  <div id="addBtn"></div>
	</div>
  <input type="submit" value="Submit" class="btn btn-primary my-2"/>
</form>

<div class='button-wrapper'>
	 <a href='profile.php' class='btn btn-secondary mt-3'> Cancel</a>
</div>
      </div>
</div>
<!-- footer from header.html -->
<?php include "footer.html" ?>
</body>
  <?php include "files.php" ?>
</html>
