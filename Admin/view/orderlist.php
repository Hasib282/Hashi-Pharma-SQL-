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
	<title>Order List</title>
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
</head>
<body>
	<?php require "include/adminhead.php"; ?>
	<?php  
	require_once '../controller/adminInfo.php';

	$orders = fetchOrder();

	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="search">
					<form action="../view/searchpage.php">
					    <input type="search" placeholder="Search.." name="searchOrder">
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
								<td colspan="11"><h1 align="center">Order List</h1></td>
							</tr>
					        <tr>  
					            <th>OrderId</th> 
					            <th>Name</th> 
					            <th>Address</th> 
					            <th>Product Name</th> 
					            <th>Price</th>  
					            <th>Quantity</th> 
					            <th>Total</th>   
					            <th>OrderDate</th>               
					            <th>Order Status</th>               
					            <th>Edit</th>                   
					        </tr>  
					        <?php foreach ($orders as $i => $order): ?>
								<tr>
									<td><?php echo $order['0'] ?></td>
									<td><?php echo $order['1'] ?></td>
									<td><?php echo $order['2'] ?></td>
									<td><?php echo $order['3'] ?></td>
									<td><?php echo $order['4'] ?></td>
									<td><?php echo $order['5'] ?></td>
									<td><?php echo $order['6'] ?></td>
									<td><?php echo $order['7'] ?></td>
									<td><?php echo $order['8'] ?></td>
									<td><a href="updateOrder.php?id=<?php echo $order['0'] ?>">Edit</a></td>
								</tr>
							<?php endforeach; ?>

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
