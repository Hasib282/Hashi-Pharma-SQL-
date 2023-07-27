<?php 
	session_start();
	if(isset($_SESSION['admin']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit profile</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/profile.js"></script>
	<style>
		#editprofile .editprofile input[type=text]{
			padding: 5px;
			width: 100%;
		}

		#editprofile input[type=submit] {
		    padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    color: green;
		    border: none;
		    margin-left: 120px;
		}
		#editprofile table{
			border: 1px solid black;
			margin: 20px 0;
		}
	</style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>



	<?php
	require_once '../controller/admininfo.php';
	$admin = fetchadminid($_SESSION['admin']);
	?>

	<?php include "../controller/updateAdmin.php"?>


	<section id="editprofile">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="editprofile">
						<form name="profileedit" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table width="100%">
								<tr>
									<td colspan="2">
										<h1 align="center">Edit Profile</h1>
										<input type="hidden" name="id" id="id" value="<?php echo $admin[0] ?>">

										<label for="uname">Userame: </label>
										<input type="text" name="uname" id="uname" value="<?php echo $admin['1'] ?>" onblur="checkUname()" onkeyup="checkUname()"><br>
										<span style="color:red;" id="uname_error"><?php echo  $error_uname;?> </span><br>
										<label for="name">Name: </label>
										<input type="text" name="name" id="name" value="<?php echo $admin['2'] ?>" onblur="checkName()" onkeyup="checkName()"><br>
										<span style="color:red;" id="name_error"><?php echo  $error_name;?> </span><br>
										<label for="email">Email:</label>
										<input type="text" name="email" id="email" value="<?php echo $admin['3'] ?>" onblur="checkEmail()" onkeyup="checkEmail()"><br>
										<span style="color:red;" id="email_error"><?php echo  $error_email;?> </span><br>
										<br>

										<input type="submit" name="editprofile" value="Update" >
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
	<?php include "include/footer.php"; ?>
</body>
</html>




<?php
	}
	else{
		echo "Invalid request";
	}
?>
