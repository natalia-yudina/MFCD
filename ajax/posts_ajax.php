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
      	include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";

      	$mainSQL= "SELECT id,title,description FROM posts order by id DESC";

      	$record_per_page = 7;

      	if(isset($_POST["page"])){
      		$page = $_POST["page"];
      	}else{
      		$page = 1;
      	}
      	$start_from = ($page - 1)*$record_per_page;

      	echo paginator($mainSQL,$record_per_page);

    	$query = $mysqli->query($mainSQL." LIMIT $start_from, $record_per_page");
      $bar = "";
            while($row = mysqli_fetch_assoc($query)) {
    $bar .= "<div class='post' data-postid={$row["id"]}'>
            <div class='title'>{$row["title"]}</div>
            <div class='description'>{$row["description"]}</div>
            <div class='images'>";
        $sql = "SELECT url FROM images WHERE post_id=$row[id]";
        $imgs = $mysqli->query($sql);
            while($img = $imgs->fetch_row())
                $bar .= "<img src=\"$img[0]\">";
                // $bar .= $_SERVER['DOCUMENT_ROOT'] . "/MFCD/" . "<img src=\"$img[0]\">";
            $bar .= "
            </div>
        </div>";
        }
        echo $bar;

  echo paginator($mainSQL,$record_per_page);
?>
