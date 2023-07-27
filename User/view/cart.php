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
		require_once '../controller/placeOrder.php';
		$customer = fetchCustomerid($_SESSION['customer']);
		$carts = fetchCartbycId($customer[0]);
	?>

	

	<section id="cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cart">
						<h1 align="center">Shopping Cart</h1>
						<div class="row">
							<form action="" method="POST" enctype="multipart/form-data">
					        	<table>
								<?php 
								$subtotal = 0;
								foreach ($carts as $i => $cart): 
									$products = fetchProductById($cart[1]); 
									foreach ($products as $i => $product):
										$subtotal += $product[2]*$cart[2];
										$name = "inc";
										$name1 = "dec";
										$name2 = "quantity";
										$name3 = "total";
										$name4 = "price";
										$pid = $product[0];



										$button1 = $name.''.$pid;
										$button2 = $name1.''.$pid;
										$input1 = $name2.''.$pid;
										$input2 = $name3.''.$pid;
										$input3 = $name4.''.$pid;

										



										$price = $product[2];
										$quantity = $cart[2];
						        		if(isset($_POST[$button1])){
						        			$a = $_REQUEST[$input1];
											$quantity = $a + 1;
											$data['quantity'] = $quantity;
											updateCart($pid,$customer[0], $data);
										}
										else if(isset($_POST[$button2])){
											$a = $_REQUEST[$input1];
											$quantity = $a - 1;
											$data['quantity'] = $quantity;
											updateCart($pid,$customer[0], $data);
										}


								?>

								
					        						<tr>
					        							<td width="5%">
					        								<input type="checkbox" name="cart" value="<?php echo $product[0];?>">
					        								<input type="hidden" name="customer" value="<?php echo $customer[0] ?>">
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
					        									<input name="<?php echo $input3 ?>" type="text" value="<?php echo $product['2'] ?>">tk.
					        								</div>	
					        							</td>
					        							<td width="13%">
					        								<button name="<?php echo $button2 ?>">-</button>
					        								<input name="<?php echo $input1 ?>" type="text" value="<?php echo $quantity; ?>">
					        								<button name="<?php echo $button1 ?>" onclick="add()">+</button>
					        							</td>
					        							<td width="10%">
					        								<div class="total">
					        									Total <br>

					        								<?php 
					        								$Total = $price * $quantity;
					        								?>
					        								<input name="<?php echo $input2 ?>" type="text" value="<?php echo $Total; ?>" readonly>
					        								</div>
					        							</td>
					        							<td width="12%">
					        								<a href="../controller/removecart.php?pid=<?php echo $product[0];?>&cid=<?php echo $customer[0] ?>"><i class="fa-solid fa-trash"></i>Remove</a>
					        							</td>
					        						</tr>		
									<?php endforeach; ?>
								<?php endforeach; 
								
								?>

								<tr>
									<td colspan="7" align="right">SubTotal: <?php echo $subtotal; ?></td>
								</tr>
								<tr>
									<td colspan="7" align="Center" class="order"><button name="order" type="Submit">Place Order</button></td>
								</tr>
								</table>
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

