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
	<title>Add Product</title>
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
		$manufacturers = fetchManufacturer();
		$categorys = fetchCategory();
		include "../controller/addProduct.php"
	?>

	<!-- registration part html start -->
	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" name="addproduct" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
							<table align="center">
								<tr>
									<td></td>
									<td>
										<h1 >Add Product</h1>
									</td>
									<!-- <td></td> -->
								</tr>	
								<!-- productname part  -->
								<tr>
									<td width="24%">
										<label for="name">Name</label>
									</td>
									<td width="40%">
										<input type="text" name="name" id="name" value="<?php echo $name ?>" onblur="checkName()" onkeyup="checkName()">
									</td>
									<td width="36%">
										<span style="color:red;" id="error_name"><?php echo  $error_name;?> </span>
									</td>
								</tr>

								<!-- name part  -->
								<tr>
									<td width="24%">
										<label for="price">Price</label>
									</td>
									<td width="40%">
										<input type="text" name="price" id="price" value="<?php echo $price ?>" onblur="checkPrice()" onkeyup="checkPrice()">
									</td>
									<td width="36%">
										<span style="color:red;" id="error_price"><?php echo  $error_price;?> </span>
									</td>
								</tr>
								

								<!-- Catagory part -->
								<tr>
									<td>
										<label for="catagory">Catagory</label>
									</td>
									<td>
										<select name="catagory" id="catagory">
									        <option value="">Select Category</option>

											<?php foreach ($categorys as $i => $category): ?>
									        <option value="<?php echo $category[0] ?>"><?php echo "$category[1]"; ?></option>
											<?php endforeach; ?>
									    </select>
									</td>
									<td>
										<span style="color:red;" id="error_catagory"><?php echo  $error_catagory;?> </span>
									</td>
								</tr>
								


								<!-- phone part  -->
								<tr>
									<td>
										<label for="manufacturer">Manufacturer</label>
									</td>
									<td>
										<select name="manufacturer" id="manufacturer">
									        <option value="">Select Manufacturer</option>

											<?php foreach ($manufacturers as $i => $manufacturer): ?>
									        <option value="<?php echo $manufacturer[0] ?>"><?php echo "$manufacturer[1]"; ?></option>
											<?php endforeach; ?>
									    </select>
									</td>
									<td>
										<span style="color:red;" id="error_manufacturer"> <?php echo  $error_manufacturer;?></span>
									</td>
								</tr>


								<!-- gender part -->
								<tr>
									<td>
										<label for="stock">Stock</label>
									</td>
									<td>
										<input type="text" name="stock" id="stock" value="<?php echo $stock ?>" onblur="checkStock()" onkeyup="checkStock()">
									</td>
									<td>
										<span style="color:red;" id="error_stock"><?php echo  $error_stock;?> </span>
									</td>
								</tr>


								<!-- image part -->
								<tr>
									<td>
										<label for="image" id="pro">Image</label>
									</td>
									<td>
										<input type="file" name="image" id="image" onblur="checkImage()" onkeyup="checkImage()">
									</td>
									<td>
										<span style="color:red;" id="error_image"><?php echo  $error_image;?> </span>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="submit" name="AddProduct" value="Submit" id="AddProduct">
										<input type="reset"  name="reset" value="Reset" onclick="reset()">
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

<?php
	}
	else{
		echo "Invalid request";
	}
?>