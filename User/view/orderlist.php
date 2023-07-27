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
	<title>Order List</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		body{

		}
        table, th, td, tr{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        

    </style>
</head>
<body>
	<?php require "include/customerhead.php"; ?>
	<?php  
	require_once '../controller/customerInfo.php';

	$orders = fetchOrder();

	?>

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
					            <th>ID</th> 
					            <th>Product_Id</th> 
					            <th>Quantity</th>  
					            <th>Product_Price</th> 
					            <th>Total</th>   
					            <th>OrderDate</th>               
					            <th>Order Status</th>                         
					            <th>Delete</th>          
					        </tr>  
					        <?php foreach ($orders as $i => $order): ?>
								<tr>
									<td><?php echo $order['OrderId'] ?></td>
									<td><?php echo $order['ID'] ?></td>
									<td><?php echo $order['Product_Id'] ?></td>
									<td><?php echo $order['Quantity'] ?></td>
									<td><?php echo $order['Product_Price'] ?></td>
									<td><?php echo $order['Total'] ?></td>
									<td><?php echo $order['OrderDate'] ?></td>
									<td><?php echo $order['Status'] ?></td>
									<td><a href="../controller/deleteOrder.php?id=<?php echo $order['OrderId'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
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
