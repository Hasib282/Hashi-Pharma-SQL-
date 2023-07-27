<?php 
session_start();
if(isset($_SESSION['admin']))
{
	if(isset($_GET['searchUser']))
	{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer List</title>
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
	<?php 
	require "include/adminhead.php";  
	require_once '../controller/adminInfo.php';
	$search = $_GET['searchUser'];
	$customers = fetchsearchCustomer($search);

	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="search">
					<form action="../view/searchpage.php">
					    <input type="search" placeholder="Search.." name="searchUser">
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
						<h2>Your search result for : <?php echo $search; ?> </h2><br>
					        <table width="100%">
							<tr>
								<td colspan="11"><h1 align="center">Customer List</h1></td>
							</tr>
					        <tr>  
					            <th>ID</th> 
					            <th>User Name</th> 
					            <th>Name</th> 
					            <th>E-mail</th>  
					            <th>Phone</th> 
					            <th>Gender</th>   
					            <th>Address</th>      
					            <th>Password</th>      
					            <th>Profile</th>                            
					            <th>Delete</th>          
					        </tr>  
					        <?php foreach ($customers as $i => $customer): ?>
								<tr>
									<td><?php echo $customer['0'] ?></td>
									<td><?php echo $customer['1'] ?></td>
									<td><?php echo $customer['2'] ?></td>
									<td><?php echo $customer['3'] ?></td>
									<td><?php echo $customer['4'] ?></td>
									<td><?php echo $customer['5'] ?></td>
									<td><?php echo $customer['6'] ?></td>
									<td><?php echo $customer['7'] ?></td>
									<td><img width="80px" src="../../User/View/images/<?php echo $customer['8'] ?>" alt="<?php echo $customer['1'] ?>"></td>
									<td><a href="../controller/deleteCustomer.php?id=<?php echo $customer['0'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
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
	else if(isset($_GET['searchAdmin']))
	{
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin List</title>
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
	<?php 
	require "include/adminhead.php";  
	require_once '../controller/adminInfo.php';
	$search = $_GET['searchAdmin'];
	$admins = fetchsearchAdmin($search);

	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="search">
					<form action="../view/searchpage.php">
					    <input type="search" placeholder="Search.." name="searchAdmin">
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
						<h2>Your search result for : <?php echo $search; ?> </h2><br>
						<table width="100%">
							<tr>
								<td colspan="11"><h1 align="center">Admin</h1></td>
							</tr>
					        <tr>  
					            <th>ID</th> 
					            <th>User Name</th> 
					            <th>Name</th> 
					            <th>E-mail</th>  
					            <th>Password</th>                   
					            <th>Status</th>                   
					            <th>Edit</th>          
					            <th>Delete</th>          
					        </tr>
					        <?php 

								foreach ($admins as $i => $admin): 
							?>
								<tr>
									<td><a href="showStudent.php?id=<?php echo $admin['0'] ?>"><?php echo $admin['0'] ?></a></td>
									<td><?php echo $admin['1'] ?></td>
									<td><?php echo $admin['2'] ?></td>
									<td><?php echo $admin['3'] ?></td>
									<td><?php echo $admin['4'] ?></td>
									<td><?php echo $admin['5'] ?></td>
									<td><a href="editAdmin.php?id=<?php echo $admin['0'] ?>">Edit</a></td>
									<td><a href="../controller/deleteAdmin.php?id=<?php echo $admin['0'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
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
	else if(isset($_GET['searchOrder']))
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
	<?php 
	require "include/adminhead.php";  
	require_once '../controller/adminInfo.php';
	$search = $_GET['searchOrder'];
	$orders = fetchsearchOrder($search);

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
	else if(isset($_GET['searchProduct']))
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
	<?php 
	require "include/adminhead.php";  
	require_once '../controller/adminInfo.php';
	$search = $_GET['searchProduct'];
	$products = fetchsearchProduct($search);

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
}
else{
	echo 'invalid request';
}


?>

