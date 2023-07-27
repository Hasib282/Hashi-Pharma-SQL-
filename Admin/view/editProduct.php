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
	<title>Edit Product</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/addproduct.js"></script>
	<style>
		select{
			width: 100%;
			padding: 5px;
			height: 40px;
		}
	</style>
</head>
<body>
	<!-- header part include -->
	<?php require "include/adminhead.php" ?>

	<?php 
		
		require_once '../controller/adminInfo.php';
		$product = fetchProductById($_GET['id']);

		include "../controller/editProduct.php";
	?>

	<!-- registration part html start -->
	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form action="" name="addproduct" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table align="center">
								<tr>
									<td>
										<h1 >Edit Product</h1>
									</td>
								</tr>	
								<!-- productname part  -->
								<tr>
									<td>
										<input type="hidden" name="id" id="id" value="<?php echo $product[0] ?>">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" value="<?php echo $product[1] ?>" readonly>
										<label for="price">Price</label>
										<input type="text" name="price" id="price" value="" placeholder="Enter new price to replace old price"><br>
										<span style="color:red;" id="error_price"><?php echo  $error_price;?> </span>
										<label for="stock">Stock</label><br>
										<input type="text" name="stock" id="stock" value="" placeholder="Enter new stock amount to add with old stock"> <br>
										<span style="color:red;" id="error_stock"><?php echo  $error_stock;?> </span>
									</td>
								</tr>

								<tr>
									<td>
										<input type="submit" name="EditProduct" value="Submit" id="EditProduct">
									</td>
								</tr>	
							</table>
						</fieldset>
					</form>
				</div>
				<div class="col-md-3"></div>
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