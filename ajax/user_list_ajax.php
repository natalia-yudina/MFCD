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

	$mainSQL= "SELECT user.id,user.fullname,user.email,user.password, IF(user.isACompany = 1,'Yes' ,'No') as isACompany, role.role FROM user,role WHERE user.role_id = role.id order by user.id DESC";

	$record_per_page = 3;

	if(isset($_POST["page"])){
		$page = $_POST["page"];
	}else{
		$page = 1;
	}
	$start_from = ($page - 1)*$record_per_page;

	echo paginator($mainSQL,$record_per_page);
?>

<table class="table table-hover" id="user">
  <thead>
    <tr>
	  <!-- <th scope="col"></th> -->
    <th scope="col">ID</th>
    <th scope="col">Fullname</th>
    <th scope="col">Email</th>
    <th scope="col">Password</th>
    <th scope="col">A company</th>
		<th scope="col">Role</th>

		<th scope="col"></th>
		<th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php
	$query = $mysqli->query($mainSQL." LIMIT $start_from, $record_per_page");
        while($row = mysqli_fetch_assoc($query)) {
			echo "<tr id='record_".$row['id']."' >";
			echo "<td>" . $row['id'] . "</td>";
            echo "<td id='recordFullname_".$row['id']."'>" . $row['fullname'] . "</td>";
            echo "<td id='recordEmail_".$row['id']."'>" . $row['email'] . "</td>";
            echo "<td id='recordPassword_".$row['id']."'>" . $row['password'] . "</td>";
            echo "<td id='recordIsACompany_".$row['id']."'>" . $row['isACompany'] . "</td>";
						echo "<td id='recordRole_".$row['id']."'>" . $row['role'] . "</td>";
			// Edit button
			echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-primary user' id='edit_car' data-id='".$row['id']."' data-action='edit'>Edit</button>
				  </div>
				  </td>";
			// Delete button
			echo "<td><div class='btn-group'>
				  <button type='button' class='btn btn-danger user' id='delete_car' data-id='".$row['id']."' data-action='delete'>Delete</button>
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
