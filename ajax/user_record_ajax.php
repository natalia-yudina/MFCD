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

if($_POST['id']) {
	$id      = trim(htmlspecialchars(stripslashes(cl($_POST["id"]))));
	$query = $mysqli->query("SELECT * FROM user WHERE id=".$id);
	$myrow = $query->fetch_assoc();

        echo "
		<div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Edit a record with id: $myrow[id]</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>

        <div class='modal-body'>
				<div class='card-body'>
                <form class='car_action_form'>

                    <div class='form-group'>
                        <div id='message' class='alert alert-danger mt-1 d-none align-middle text-center'></div>
                    </div>


										<div class='form-group row'>
			                         <label for='fullname' class='col-md-4 col-form-label text-md-right'>Fullname</label>
			                         <div class='col-md-6'>
			                             <input type='text' id='fullname' class='form-control' name='fullname' value='$myrow[fullname]'>
			                             <div id='fullname_warning_message' class='text-danger mt-1 d-none'></div>
			                         </div>
			                     </div>

			       <div class='form-group row'>
                        <label for='email' class='col-md-4 col-form-label text-md-right'>Email</label>
                        <div class='col-md-6'>
                            <input type='text' id='email' class='form-control' name='email' value='$myrow[email]'>
                            <div id='email_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
                    </div>


			       <div class='form-group row'>
                        <label for='password' class='col-md-4 col-form-label text-md-right'>Password</label>
                        <div class='col-md-6'>
                            <input type='text' id='password' class='form-control' name='password' value='$myrow[password]'>
                            <div id='password_warning_message' class='text-danger mt-1 d-none'></div>
                        </div>
                    </div>

                    <div class='form-group row'>
                        <label for='isACompany' class='col-md-4 col-form-label text-md-right'>A company</label>
                        <div class='col-md-6'>
                            <div class='custom-control custom-checkbox mt-2'>
                                <input type='checkbox' class='custom-control-input' id='isACompany'

									";
										if ($myrow[ 'isACompany']!=0)
										{
											echo "checked";
										} else {

										};
									echo "
							     >
                                    <label class='custom-control-label' for='isACompany'></label>
                            </div>

                        </div>
                    </div>

										<div class='form-group row'>
											<label for='role_id' class='col-md-4 col-form-label text-md-right'>Role</label>
											<div class='col-md-6'>

													<select class='form-control' name='role_id' id='role_id'>
															<option value='0'>=== Select Role ===</option>
					 ";
									 $query = $mysqli->query("SELECT id,role FROM role");
									 while($row = mysqli_fetch_assoc($query)) {
										 $selected = ($row['id'] == $myrow['role_id']) ? ' selected' : '';
										 echo "<option ".$selected." value=".$row['id'].">".$row['role']."</option>";
									 }
					 echo "

													</select>

													<div id='role_id_warning_message' class='text-danger mt-1 d-none'></div>

											</div>
									</div>
									
			        </form>
            </div>

		</div>
        <div class='modal-footer'>
		  <button type='button' class='btn btn-success user' data-id='$myrow[id]' data-action='update'>Update</button>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>
        ";
}

?>
