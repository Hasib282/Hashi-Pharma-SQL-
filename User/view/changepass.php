<?php 
	session_start();
	if(isset($_SESSION['customer']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/changepass.js"></script>
	<style>
		#changepass table{
			border: 1px solid black;
			margin-top: 20px;
		}
		#changepass input[type=text],input[type=password]{
			padding: 5px;
			width: 100%;
			height: 50px;
		}
		#changepass label{
			font-size: 20px;
			padding: 10px 0;
		}


		#changepass input[type=submit] {
		    padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    color: green;
		    border: none;
		    margin-left: 125px;
		    margin-top: 10px;
		}
	</style>
</head>
<body>
	<?php require "include/customerhead.php"; ?>

	<?php
	include '../controller/customerinfo.php';
	$customer = fetchCustomerid($_SESSION['customer']);
	include "../controller/updatePass.php";
	?>




	<section id="changepass">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="changepass">
						<form action="" method="POST" enctype="multipart/form-data" name="changepass" onsubmit="return validateForm()">
							<table width="100%">
								<tr>
									<td>
										<h3 align="center">Change Password</h3>
										<input type="hidden" name="id" id="id" value="<?php echo $customer[0] ?>"><br>
										<label for="cpass">Current Password</label>
										<input type="Password" name="cpass" id="cpass" onblur="checkCurrentPass()" onkeyup="checkCurrentPass()">
										<span style="color:red;" id="cpass_error"><?php echo $error_cpass ?></span><br>
										<label for="npass">New Password</label>
										<input type="Password" name="npass" id="npass" onblur="checkNewPass()" onkeyup="checkNewPass()">
										<span style="color:red;" id="npass_error"> <?php echo $error_npass ?></span><br>
										<label for="cnpass">Confirm Password</label>
										<input type="Password" name="cnpass" id="cnpass" onblur="checkConfirmNewPass()" onkeyup="checkConfirmNewPass()">
										<span style="color:red;" id="cnpass_error"><p><?php echo $error_cnpass ?></p></span><br>
				            			<input type="submit" name="changepass" value="Submit">
									</td>
								</tr>
				            </table>
						</form>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</section>

    <br><br>
	<?php include "include/footer.php"; ?>
</body>
</html>









<?php
	}
	else{
		echo "Invalid request";
	}
?>