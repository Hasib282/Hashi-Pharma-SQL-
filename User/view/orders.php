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
	<title>Customer</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		
        table{
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }
        table tr{
        	border-top:1px solid ;
        	border-bottom:1px solid ;
        }
        .product{
        	height: 310px;
        	width: 260px;
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
        }
        .product h4{
        	font-size: 17px;
        }
        input[type=text] {
		  padding: 8px;
		  width: 40px;
		  height: 42px;
		  margin: 0;
		  font-size: 17px;
		  border: none;
		}
		.cart button{
			border: none;
			width: 20px;
			padding: 5px;
/*			background: transparent;*/
			font-size: 22px;
		}
		.total input[type=text] {
		  padding: 2px;
		  width: 50px;
		  height: 42px;
		  margin: 0;
		  font-size: 15px;
		  border: none;
		  background: transparent;
		}
		.order button{
			width: 300px;
			height: 40px;
			background: #99cc33;
			color: green;
		}
		p{
			margin: 0;
			padding: 0;
		}
/*		input[type=checkbox]{
			height: 30px;
			width: 30px;
		}*/

        

    </style>
</head>
<body>
	<?php 
		require "include/customerhead.php"; 
		require_once '../controller/customerInfo.php';
		require_once '../controller/cancelOrder.php';
		$customer = fetchCustomerid($_SESSION['customer']);
		$orders = fetchOrderbyId($customer[0]);
	?>

	

	<section id="cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cart">
						<h1 align="center">Orders</h1>
						<div class="row">
							<form action="" method="POST" enctype="multipart/form-data">
					        	<table style="border:1px solid; border-collapse:collapse;">
					        		<tr align="center">
					        			<th>Select</th>
					        			<th>Image</th>
					        			<th>Product Details</th>
					        			<th>Price</th>
					        			<th>Quantity</th>
					        			<th>Total</th>
					        			<th>Status</th>
					        		</tr>
									<?php 
									foreach ($orders as $i => $order): 
										$products = fetchProductById($order[2]); 
										foreach ($products as $i => $product):
									?>
									<tr>
										<td>
											<input type="checkbox" name="order" value="<?php echo $order[0];?>">
					        				<input type="hidden" name="customer" value="<?php echo $order[1] ?>">
										</td>
										<td width="16%">
					        				<img class="image-responsive" src="../../Admin/view/images/<?php echo $product['6'] ?>" style="height: 150px; width:228px;">
					        			</td>
					        			<td width="30%">
					        				<p><?php echo $product['1'] ?></p>
					        				<p style="color:gray;"><?php echo $product['3'] ?></p>
					        				<p style="font-size:14px"><a href="" style="color:#F5A445;"><?php echo $product['4'] ?></a></p>
					        			</td>
					        			<td width="10%">
					        				<div class="total">
					        					<?php echo $order['3'] ?>tk.
					        				</div>	
					        			</td>
					        			<td width="13%">
					        				<?php echo $order['4']; ?>
					        			</td>
					        			<td>
					        				<?php echo $order['5']; ?>
					        			</td>

										<td>
											<?php echo $order[7];?>
										</td>
									</tr>
									
						        			

									<?php 
										endforeach; 
									endforeach; 
									
									?>
								</table>
								<h1 align="center" class="order"><button name="cancelorder" type="Submit">Cancel Order</button></h1>
							</form>	
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
		echo "Invalid request";
	}
?>

