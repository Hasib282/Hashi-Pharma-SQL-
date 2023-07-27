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
	<title>Edit Order</title>
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
	?>

	<?php include "../controller/updateOrder.php"?>


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
										<h1 align="center">Edit Order</h1>
										<label for="id">Id: </label>
										<input type="text" name="id" id="id" value="<?php echo $_GET['id'] ?>" readonly>

										<label for="status">Status: </label><br>
										<select name="status" id="status" style="width: 100%; padding: 10px; font-size: 20px;">
											<option value="">Select Status</option>
											<option value="Ordered">Ordered</option>
											<option value="Cancelled">Cancelled</option>
											<option value="Delivered">Delivered</option>
										</select><br>
										<span style="color:red;" id="status_error"> <?php echo $error_status ?> </span><br>
										<br>

										<input type="submit" name="editOrder" value="Update" >
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
