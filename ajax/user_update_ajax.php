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

	if ($_POST["id"] != '') {

	$id     = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));

    // $make_id      = trim(htmlspecialchars(stripslashes(cl($_POST["make_id"]))));
    // $year         = trim(htmlspecialchars(stripslashes(cl($_POST["year"]))));
    // $plate_number = trim(htmlspecialchars(stripslashes(cl($_POST["plate_number"]))));
    // $available    = trim(htmlspecialchars(stripslashes(cl($_POST["available"]))));

		$fullname      = trim(htmlspecialchars(stripslashes(cl($_POST["fullname"]))));
    $email         = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));
    $password = trim(htmlspecialchars(stripslashes(cl($_POST["password"]))));
    $isACompany    = trim(htmlspecialchars(stripslashes(cl($_POST["isACompany"]))));
    $role_id         = trim(htmlspecialchars(stripslashes(cl($_POST["role_id"]))));

    $query = mysqli_query($mysqli, "UPDATE user SET fullname='$fullname',email='$email',password='$password',isACompany='$isACompany',role_id='$role_id' WHERE id='$id'");

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
