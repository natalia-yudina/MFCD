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

<!-- add post begin -->
<?PHP

$arr = [];
if(isset($_FILES["foto"])){
    // $dir = "/Applications/XAMPP/xamppfiles/htdocs/MFCD/upload/images";
    $dir = "upload/images";
    if(!is_dir($dir))
        mkdir($dir,0777,true);
    for($i = 0; $i < count($_FILES["foto"]["name"]);$i++){
        if($_FILES["foto"]["error"][$i] == 0 && preg_match("/^image/",$_FILES["foto"]["type"][$i])){
            array_push($arr,$dir."/".time()."_".preg_replace("/[а-яА-Я\s]/i", '', $_FILES["foto"]["name"][$i]));
            move_uploaded_file($_FILES["foto"]["tmp_name"][$i],end($arr));
        }
    }
}
$title = trim(htmlspecialchars($_POST["title"]));
$description = trim(htmlspecialchars($_POST["description"])) . " * Recommended by " . $_SESSION['fullname'];

// if($title && $description && $con = sql_connect()){
if($title && $description){
    $sql = "INSERT INTO posts(title,description) VALUES('$title','$description')";
		$mysqli->query($sql);
    $sql = "SELECT MAX(id) FROM posts";
    $res = $mysqli->query($sql);
    $row = $res->fetch_row();
    for($i = 0; $i < count($arr);$i++){
        $sql = "INSERT INTO images(url,post_id) VALUES('$arr[$i]','$row[0]')";
				$mysqli->query($sql);
    }
}
else
{};
    // echo "Error: no data!";
// $con->close();

?>
<!-- add post end -->

<!DOCTYPE html>
<html lang="en">
<?php
$page_title = "Posts";
include "head.php" ?>

    <style>

        .post{
            color: #678;
            width:60%;
            margin: auto;
            border: 1px solid #678;
            margin-top:25px;
        }
        .post .title{
            color: white;
            font-size:1em;
            padding: 7px;
            background:#678;
            border-bottom: 1px solid #678;
        }
        .post .description{
            padding: 15px;
        }
        .post .images img{
            border-radius: 20px;
            margin: 20px auto;
            width: 50%;
            display: block;

        }
        .post .images{
            padding: 15px;
            max-height: 500px;
            overflow: overlay;
        }
    </style>
</head>
<body>

  <?php
	$img_source = "images/HeaderTop2.png";
  include "header.php"
  ?>

	<main class="container">
  	<div id="post_data"></div>
  </main>

    <!-- footer from header.html -->
    <?php include "footer.html" ?>
</body>
  <?php include "files.php" ?>
	<script src="js/posts_list.js"></script>
</html>
