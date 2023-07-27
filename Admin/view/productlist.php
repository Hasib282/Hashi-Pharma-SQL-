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
	<title>Product List</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		body{
			background: #F3F7FB;
		}
        table, th, td, tr{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        input[type=search] {
		  padding: 8px;
		  width: 350px;
		  margin: 0;
		  margin-top: 30px;
		  font-size: 17px;
		  position: absolute;
		  left: 100px;
		  border: none;
		}
		.search{
			position: relative;
		}
		.search button {
		  margin: 0;
		  padding: 8px 10px;
		  margin-top: 30px;
		  margin-right: 16px;
		  background: #ffffff;
		  font-size: 17px;
		  border: none;
		  cursor: pointer;
		  position: absolute;
		  left: 450px;
		}
        

    </style>
        

    </style>
</head>
<body>
	<?php require "include/adminhead.php"; ?>
	<?php  
	require_once '../controller/adminInfo.php';

	$products = fetchProduct();

	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="search">
					<form action="../view/searchpage.php">
					    <input type="search" placeholder="Search.." name="searchProduct">
					    <button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<br>
	<br>
	<br>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="10"><h1 align="center">Product List</h1></td>
							</tr>
					        <tr>  
					            <th>Product Id</th> 
					            <th>Product Name</th> 
					            <th>Price</th> 
					            <th>Catagory</th>  
					            <th>Manufacturer</th> 
					            <th>Stock</th>             
					            <th>Image</th>                    
					            <th>Edit</th>                    
					        </tr>  
					        <?php foreach ($products as $i => $product): ?>
								<tr>
									<td><?php echo $product['0'] ?></td>
									<td><?php echo $product['1'] ?></td>
									<td><?php echo $product['2'] ?></td>
									<td><?php echo $product['3'] ?></td>
									<td><?php echo $product['4'] ?></td>
									<td><?php echo $product['5'] ?></td>
									<td><img width="80px" height="60px" src="images/<?php echo $product['6'] ?>" alt="<?php echo $product['1'] ?>"></td>
									<td><a href="editProduct.php?id=<?php echo $product['0'] ?>">Edit</a></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="11" align="center" style="padding: 20px;"><a href="addProduct.php" style="font-size: 30px; padding: 5px; background-color: #99cc33;">Add Product</a></td>
							</tr>
					    </table> 
					    
					</div>
				</div>
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
