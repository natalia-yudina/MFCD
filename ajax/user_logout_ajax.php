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
// // remove all session variables
// session_unset();
//
// // destroy the session
// session_destroy();
 ?>

<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/MFCD/DB_connection.php";

	unset($_SESSION['password']);
	unset($_SESSION['email']);
	unset($_SESSION['fullname']);
	unset($_SESSION['user_id']);
	unset($_SESSION['role']);
	unset($_SESSION['role_id']);
	unset($_SESSION['notes']);



	header('Content-type: application/json; charset=utf-8');
	$massiv_jasone['resultOK'] = true;
	$massiv_jasone['message']  = 'OK';
	$jason_encode              = json_encode($massiv_jasone);
	echo $jason_encode;

?>
