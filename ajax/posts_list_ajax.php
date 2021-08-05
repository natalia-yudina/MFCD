<?php
/*
************************************************************
Course    : STD701 System Development Integration II
Student   : s00009622 Natalia Iudina
Date      : 25-03-2021
************************************************************
*/
?>

<div class="modal fade" id="myModal">
	<div class='modal-dialog'>
	</div>
</div>

<br>

<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";

	$mainSQL= "SELECT * FROM posts order by posts.id DESC";

	$record_per_page = 3;

	if(isset($_POST["page"])){
		$page = $_POST["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page - 1)*$record_per_page;

	echo paginator($mainSQL,$record_per_page);
?>

<table class="table table-hover" id="post">
  <thead>
    <tr>
	  <!-- <th scope="col"></th> -->
    <th scope="col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Description</th>

		<th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php
	$query = $mysqli->query($mainSQL." LIMIT $start_from, $record_per_page");
        while($row = mysqli_fetch_assoc($query)) {
			echo "<tr id='record_".$row['id']."' >";
			echo "<td>" . $row['id'] . "</td>";
            echo "<td id='recordTitle_".$row['id']."'>" . $row['title'] . "</td>";
            echo "<td id='recordDescription_".$row['id']."'>" . $row['description'] . "</td>";

			// Delete button
			echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-danger post' id='delete_post' data-id='".$row['id']."' data-action='delete'>Delete</button>
				  </div>
				  </td>";
		echo "</tr>";
        }
?>
 </tbody>
 </table>

<?php
	echo paginator($mainSQL,$record_per_page);
?>
