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

    $fullname      = trim(htmlspecialchars(stripslashes(cl($_POST["fullname"]))));
    $email         = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));
    $password = trim(htmlspecialchars(stripslashes(cl($_POST["password"]))));

	$query = mysqli_query($mysqli, "INSERT user (fullname,email,password,role_id) VALUES ('$fullname','$email','$password',2)");

    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = true;
    $massiv_jasone['message']  = "OK";
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;

?>
