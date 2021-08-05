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

	if ($_POST["id"] != '') {

	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));

		$fullname      = trim(htmlspecialchars(stripslashes(cl($_POST["fullname"]))));
    $email         = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));
    $home_lat      = trim(htmlspecialchars(stripslashes(cl($_POST["home_lat"]))));
    $home_lon      = trim(htmlspecialchars(stripslashes(cl($_POST["home_lon"]))));
    // $password = trim(htmlspecialchars(stripslashes(cl($_POST["password"]))));
    // $isACompany    = trim(htmlspecialchars(stripslashes(cl($_POST["isACompany"]))));
    // $role_id         = trim(htmlspecialchars(stripslashes(cl($_POST["role_id"]))));

    $query = mysqli_query($mysqli, "UPDATE user SET fullname='$fullname',email='$email',home_lat='$home_lat',home_lon='$home_lon' WHERE id='$id'");

    $_SESSION['fullname'] = $fullname;
    $_SESSION['email']    = $email;
    $_SESSION['home_lat'] = $home_lat;
    $_SESSION['home_lon'] = $home_lon;


    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK : ".$id;
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
} else {
    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = false;
    $massiv_jasone['message']  = "ERROR";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
}

?>
