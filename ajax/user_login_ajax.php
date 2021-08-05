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

if ($_POST["email"] != '' and $_POST["password"] != '') {

    $email    = trim(htmlspecialchars(stripslashes(cl($_POST["email"]))));
    $password = trim(htmlspecialchars(stripslashes(cl($_POST["password"]))));

    $query = $mysqli->query("SELECT * FROM user WHERE email='" . $email . "' AND password='" . $password . "'");
    $myrow = $query->fetch_assoc();

        if (empty($myrow['id'])) {
            header('Content-type: application/json; charset=utf-8');
            $massiv_jasone['resultOK'] = false;
            $massiv_jasone['message']  = 'Autorization is not successfull! Email or password is incorrect!';
            $jason_encode              = json_encode($massiv_jasone);
            echo $jason_encode;
        } else {
            $_SESSION['user_id']  = $myrow['id'];
            $_SESSION['fullname'] = $myrow['fullname'];
            $_SESSION['password'] = $myrow['password'];
            $_SESSION['email']    = $myrow['email'];
            $_SESSION['role_id']  = $myrow['role_id'];
            $_SESSION['notes']    = $myrow['notes'];
						$_SESSION['home_lat'] = $myrow['home_lat'];
            $_SESSION['home_lon'] = $myrow['home_lon'];

            $query2            = $mysqli->query("SELECT id, role FROM role WHERE id = " . $myrow['role_id']);
            $myrow2            = $query2->fetch_assoc();
            $_SESSION['role'] = $myrow2['role'];

            header('Content-type: application/json; charset=utf-8');
            $massiv_jasone['resultOK'] = true;
						// my item begin
						$massiv_jasone['role_id'] = $_SESSION['role_id'];
						// my item end
            $massiv_jasone['message']  = 'OK : '.$_SESSION['role_id'];
            $jason_encode              = json_encode($massiv_jasone);
            echo $jason_encode;
        }

} else {
    header('Content-type: application/json; charset=utf-8');
    $massiv_jasone['resultOK'] = false;
    $massiv_jasone['message']  = 'ERROR';
		// my item begin
		// $massiv_jasone['role_id'] = 0;
		// my item end
    $jason_encode              = json_encode($massiv_jasone);
    echo $jason_encode;
}
?>
