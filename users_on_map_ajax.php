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
	// session_start();
	// include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";
  $mysqli = new mysqli("localhost", "root", "", "MFCD");

 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
 }

  // $myquery= "SELECT home_lat, home_lon FROM user where (home_lat<>0 and home_lon<>0)";
  // $myquery= "SELECT user.email,user.password, IF(user.isACompany = 1,'Yes' ,'No') as isACompany, role.role FROM user,role WHERE user.role_id = role.id order by user.id DESC";

  $myquery= "SELECT  `fullname`,`home_lat`, `home_lon` FROM  `user` where (`home_lon`>0 and `id`<>$id)";
	$query = $mysqli->query($myquery);
  // $query = mysql_query($myquery);

      if ( ! $query ) {

          echo mysql_error();

          die;
      }

    //
    //   $data = array();
    //
  	// echo "var planelatlong = [";

      // for ($x = 0; $x < mysql_num_rows($query); $x++) {
      //     $data[] = mysql_fetch_assoc($query);
      //     echo "[",$data[$x]['lat'],",",$data[$x]['long'],"]";
      //     if ($x <= (mysql_num_rows($query)-2) ) {
  		// 	echo ",";
  		// }
      // }
      //
      // 	echo "];";

      // for ($x = 0; $x < mysql_num_rows($query); $x++) {
            // $data[] = mysql_fetch_assoc($query);

        // for ($x = 0; $x < mysql_num_rows($query); $x++) {
            // $data[] = $query->fetch_assoc();

   while($row = mysqli_fetch_assoc($query)) {
  // echo  "L.marker([" .$row['home_lat'] . "," .$row['home_lon'] ."], {icon: greenIcon}).addTo(mymap); ";
  echo  "L.marker([" .$row['home_lat'] . "," .$row['home_lon'] ."],{opacity: 0.8}).addTo(mymap).bindPopup('" .$row['fullname'] ."'); ";
 }

// echo "var lat = -43.54;";
// echo "var lon = 172.599;";
// echo " L.marker([-43.55, 172.63469696044922], {icon: greenIcon}).addTo(mymap);";
// echo " L.marker([-43.5306291704, 172.6346969604], {icon: greenIcon}).addTo(mymap);";
// echo " L.marker([-43.54, 172.599], {icon: greenIcon}).addTo(mymap);";

  // echo  "L.marker([",$data[$x]['home_lat'],",",$data[$x]['home_lon'],"], {icon: greenIcon}).addTo(mymap); ";

 // }
          // -43.55, 172.63469696044922


            //
  	// $query = $mysqli->query($mainSQL);
    //       while($row = mysqli_fetch_assoc($query)) {
  	// 		echo "<tr id='record_".$row['id']."' >";
  	// 		echo "<td>" . $row['id'] . "</td>";
    //           echo "<td id='recordFullname_".$row['id']."'>" . $row['fullname'] . "</td>";
    //           echo "<td id='recordEmail_".$row['id']."'>" . $row['email'] . "</td>";
    //           echo "<td id='recordPassword_".$row['id']."'>" . $row['password'] . "</td>";
    //           echo "<td id='recordIsACompany_".$row['id']."'>" . $row['isACompany'] . "</td>";
  	// 					echo "<td id='recordRole_".$row['id']."'>" . $row['role'] . "</td>";
  	// 		// Edit button
  	// 		echo "<td><div class='btn-group'>
  	// 			  <button type='button' class='btn btn-primary user' id='edit_car' data-id='".$row['id']."' data-action='edit'>Edit</button>
  	// 			  </div>
  	// 			  </td>";
  	// 		// Delete button
  	// 		echo "<td><div class='btn-group'>
  	// 			  <button type='button' class='btn btn-danger user' id='delete_car' data-id='".$row['id']."' data-action='delete'>Delete</button>
  	// 			  </div>
  	// 			  </td>";
  	// 	echo "</tr>";
    //       }

?>
