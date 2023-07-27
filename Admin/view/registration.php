<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Registratin</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/reg_valid.js"></script>
</head>
<body>
	<!-- header part include -->
	<?php require "../../User/view/include/localhead.php"; ?>
	<h1 style="color:green;" align="center">
		<?php  
			session_start();
			if(isset($_SESSION['success'])) {
				echo $_SESSION['success']; 
				session_destroy();
			} 
			else{
				echo "";
			}  
		?>
	</h1>

	<?php include "../controller/addAdmin.php"?>
	

	<!-- registration part html start -->
	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" name="Registration" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table align="center">
								<tr>
									<td></td>
									<td>
										<h1 >Registration</h1>
									</td>
									<!-- <td></td> -->
								</tr>	

								<!-- username part  -->
								<tr>
									<td width="24%">
										<label for="uname">User Name</label>
									</td>
									<td width="40%">
										<input type="text" name="uname" id="uname" value="<?php echo $uname ?>" onblur="checkUserName()" onkeyup="checkUserName()">
									</td>
									<td width="36%">
										<span style="color:red;" id="uname_error"><?php echo  $error_uname;?> </span>
									</td>
								</tr>

								<!-- name part  -->
								<tr>
									<td width="24%">
										<label for="name">Name</label>
									</td>
									<td width="40%">
										<input type="text" name="name" id="name" value="<?php echo $name ?>" onblur="checkName()" onkeyup="checkName()">
									</td>
									<td width="36%">
										<span style="color:red;" id="name_error"><?php echo  $error_name;?> </span>
									</td>
								</tr>
								

								<!-- email part -->
								<tr>
									<td>
										<label for="email">Email</label>
									</td>
									<td>
										<input type="text" name="email" id="email" value="<?php echo $email ?>" onblur="checkEmail()" onkeyup="checkEmail()">
									</td>
									<td>
										<span style="color:red;" id="email_error"><?php echo  $error_email;?> </span>
									</td>
								</tr>
								
								<!-- password part  -->
								<tr>
									<td>
										<label for="pass">Password</label>
									</td>
									<td>
										<input type="Password" name="pass" id="pass" value="<?php echo $pass ?>" onblur="checkPass()" onkeyup="checkPass()">
									</td>
									<td>
										<span style="color:red;" id="pass_error"> <?php echo  $error_pass;?></span>
									</td>

								</tr>
								


								<!-- confirm password part  -->
								<tr>
									<td>
										<label for="cpass">Confirm Password</label>
									</td>
									<td>
										<input type="Password" name="cpass" id="cpass" value="<?php echo $cpass ?>" onblur="checkCPass()" onkeyup="checkCPass()">
									</td>
									<td>
										<span style="color:red;" id="cpass_error"><?php echo  $error_cpass;?> </span>
									</td>
								</tr>


								<!-- profile picture part -->
								<tr>
									<td>
										
									</td>
									<td>
										<input type="hidden" name="status" id="status" value="Invalid">
									</td>
									<td>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="submit" name="AddAdmin" value="Submit" id="AddAdmin">
										<input type="reset"  name="reset" value="Reset" onclick="reset()">
									</td>
									<td></td>
								</tr>	
								<tr>
									<td></td>
									<td align="center">
										<p>Already have an account?<br> <a href="login.php">Login</a> </p>
									</td>
									<td></td>
								</tr>
							</table>
						</fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>					
	</section>
	<?php include "include/footer.php"; ?>
</body>
</html>