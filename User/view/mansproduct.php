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
	<title>Man's Product</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		
        .product{
        	height: 330px;
        	width: 100%;
        	margin-bottom: 25px;
        	float: left;
        	background-color: #fff;
        	padding: 15px;
        	font-size: 10px;
        	border-radius: 2%;
        	box-shadow: 0 3px 5px -2px rgba(0,0,0,.08), 0 3px 6px 0 rgba(0,0,0,.04), 0 1px 12px 0 rgba(0,0,0,.07);
        	white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    position: relative;
        }
        .product img{
        	margin-bottom: 2px;
        }
        .product h4{
        	font-size: 17px;
        }
        

    </style>
</head>
<body>
	<?php 
	require "include/customerhead.php"; 
 
	require_once '../controller/customerInfo.php';
	require_once '../controller/AddToCart.php';

	$products = fetchProductByCategory(5);
	$customer = fetchCustomerid($_SESSION['customer']);
	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
							<div class="row">
					        	<?php foreach ($products as $i => $product): ?>
					        		<div class="col-md-3">
					        			<div class="product" align="center">
					        				<form action="" method="POST" enctype="multipart/form-data">
					        					<img class="image-responsive" src="../../Admin/view/images/<?php echo $product['6'] ?>" style="height: 150px; width:228px;"><br>
					        					<h4><?php echo $product['1'] ?></h4>
					        					<h4 style="color:gray;"><?php echo $product['3'] ?></h4>
					        					<h4 style="font-size:14px"><a href="" style="color:#F5A445;"><?php echo $product['4'] ?></a></h4>
					        					<h4> <span style="font-size:20px;color:gray;">Price: </span><span style="font-size:20px;color:red;">৳ <?php echo $product['2'] ?>Tk.</span></h4>
					        					<input type="hidden" name="cid" value="<?php echo $customer['0'] ?>">
					        					<input type="hidden" name="pid" value="<?php echo $product['0'] ?>">					        					
					        					<input type="submit" name="addtocart" value="Add To Cart" class="btn btn-success" id="addtocart">
					        				</form>
							        	</div>
					        		</div>
								<?php endforeach; ?>
					        </div>
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
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Man's Product</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		
        .product{
        	height: 330px;
        	width: 100%;
        	margin-bottom: 25px;
        	float: left;
        	background-color: #fff;
        	padding: 15px;
        	font-size: 10px;
        	border-radius: 2%;
        	box-shadow: 0 3px 5px -2px rgba(0,0,0,.08), 0 3px 6px 0 rgba(0,0,0,.04), 0 1px 12px 0 rgba(0,0,0,.07);
        	white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    position: relative;
        }
        .product img{
        	margin-bottom: 2px;
        }
        .product h4{
        	font-size: 17px;
        }
        

    </style>
</head>
<body>
	<?php 
	require "include/localhead.php"; 
 
	require_once '../controller/customerInfo.php';
	require_once '../controller/AddToCart.php';

	$products = fetchProductByCategory(5);
	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
							<div class="row">
					        	<?php foreach ($products as $i => $product): ?>
					        		<div class="col-md-3">
					        			<div class="product" align="center">
					        				<form action="" method="POST" enctype="multipart/form-data">
					        					<img class="image-responsive" src="../../Admin/view/images/<?php echo $product['6'] ?>" style="height: 150px; width:228px;"><br>
					        					<h4><?php echo $product['1'] ?></h4>
					        					<h4 style="color:gray;"><?php echo $product['3'] ?></h4>
					        					<h4 style="font-size:14px"><a href="" style="color:#F5A445;"><?php echo $product['4'] ?></a></h4>
					        					<h4> <span style="font-size:20px;color:gray;">Price: </span><span style="font-size:20px;color:red;">৳ <?php echo $product['2'] ?>Tk.</span></h4>				        					
					        					<input type="submit" name="add" value="Add To Cart" class="btn btn-success" id="addtocart">
					        				</form>
							        	</div>
					        		</div>
								<?php endforeach; ?>
					        </div>
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
?>

