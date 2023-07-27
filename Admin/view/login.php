<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/login_valid.js"></script>
</head>
<body>
	<!-- header part include -->
	<?php require "../../User/view/include/localhead.php"; ?>
	<?php require "../controller/login.php"; ?>


	<section id="login">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form name="Login" action="" method="post" onsubmit="return validateForm()" >
						<table align="center" style="width:100%; ">
							<tr>
						        <td>
						        	<h3 align="center">Login</h3>
						           	
						           	<label for="id">Username/Email</label>
						           	<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="text" name="id" id="id" value="<?php if(isset($_COOKIE['id'])) {echo $_COOKIE['id'];} ?>" onblur="checkId()" onkeyup="checkId()">
						           	<span style="color:red;" id="id_error"><?php echo $error_id ?></span><br>

						           	<label for="pass">Password</label>
						           	<input style="background: <?php if(isset($_COOKIE['color'])) {echo $_COOKIE['color'];}?>" type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>" onblur="checkPass()" onkeyup="checkPass()">
						           	<span style="color:red;" id="pass_error"><?php echo $error_pass ?></span><br>
						           	<span style="color:red;"> <?php echo $msg; ?></span>
						           	<br>
						           	<a href="forgetpass.php">Forget Password?</a><br>
						           	<hr>
						           	<input type="checkbox" name="rme" id="rme" <?php if(isset($_COOKIE['id'])) {echo "checked";} ?>>
						           	<label for="rme">Remember me</label><br>
						           	
						           	<input type="submit" name="adminLogin" value="Submit">
						           	<p>Dont have an account?<br><a href="registration.php">Register here</a> </p>
						           	<p><a href="../../User/View/Login.php">Login as Customer</a> </p>

						        	
						        </td>
						    </tr>
						</table>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
				
		</div>
	</section>
	<?php include "include/footer.php"; ?>
	
</body>
</html>