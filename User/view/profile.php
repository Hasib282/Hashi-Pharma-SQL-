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
	<title>Profile</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		#profile .profile button#editpro{
			padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    border: none;
		    margin-top: 5px;
		    margin-left: 140px;
		}
		#profile .profile button#changepro{
			padding: 10px;
		    font-size: 18px; 
		    background-color: #99cc33;
		    border: none;
		    margin-top: 5px;
		}

		#profile .profile button a{
			color: green;
		}
	</style>
</head>
<body>
	<?php require "include/customerhead.php"; ?>



	<section id="profile">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-9">
					<div class="profile">
						<form action="">
							<table width="100%">
								<?php 
									include '../controller/customerinfo.php';
									$admin = fetchCustomerid($_SESSION['customer']) 
								?>
								<tr>
									<td colspan="2"><h1 align="center">Profile</h1></td>
								</tr>
								<tr>
									<td>
										<label for="">Username: </label>
									</td>
									<td>
										<?php echo $admin['1'] ?>
									</td>
								</tr>
								<tr>
									<td>
								        <label for="">Name: </label>	
									</td>
									<td>
										<?php echo $admin['2'] ?>
									</td>
									<td rowspan="7" align="center">
										<img src="images/<?php echo $admin['8']; ?>" alt="" height="200px" width="200px"><br>
										<button id='changepro'><a href="changeprofile.php">Change</a></button>
									</td>

								</tr>
								
								<tr>
									<td>
										<label for="">Email : </label>
									</td>
									<td>
										<?php echo $admin['3'] ?>
									</td>
								</tr>
								<tr>
									<td>
										<label for="">Phone:</label>
									</td>
									<td>
										<?php echo $admin['4'] ?>
									</td>
								</tr>
								<tr>
									<td>
										<label for="">Gender : </label>
									</td>
									<td>
										<?php echo $admin['5'] ?>
									</td>
								</tr>
								<tr>
									<td>
										<label for="">Address : </label>  
									</td>
									<td>
										<?php echo $admin['6'] ?>
									</td>
								</tr>
								<tr>
									<td>
										<label for="">Password :</label>
									</td>
									<td>
										<?php echo $admin['7'] ?>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<a href="changepass.php">Change Password</a>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button id='editpro'>
											<a href="editprofile.php">Edit Profile</a>
										</button>
									</td>
									<td></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="col-md-1"></div>
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




