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
	<title>Add Manufacturer</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- header part include -->
	<?php require "include/adminhead.php" ?>

	<?php include "../controller/addManufacturer.php"?>
	

	<!-- registration part html start -->
	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="" name="addmanufacturer" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table align="center">
								<tr>
									<td>
										<h3 >Add Manufacturer</h3>
									</td>
								</tr>	
								<tr>
									<td>
										<label for="id">Manufacturer Id</label><br>
										<input type="text" name="id" id="id" value="" readonly><br><br>
										<label for="name">Manufacturer Name</label><br>
										<input type="text" name="name" id="name" value="<?php echo $name ?>"><br><br>
										<span style="color:red;" id="error_name"><?php echo  $error_name;?> </span>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="AddManufacturer" value="Submit" id="AddManufacturer">
										<input type="reset"  name="reset" value="Reset" onclick="reset()">
									</td>
								</tr>	
							</table>
						</fieldset>
					</form>
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