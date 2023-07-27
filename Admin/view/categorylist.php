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
	<title>Category List</title>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<?php require "include/adminhead.php"; ?>
	<?php  
	require_once '../controller/adminInfo.php';

	$categorys = fetchCategory();

	?>

	<section id="user">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user">
						<table width="100%">
							<tr>
								<td colspan="4"><h1 align="center">Category List</h1></td>
							</tr>
					        <tr>  
					            <th>Category Id</th> 
					            <th>Category Name</th>                                       
					        </tr>  
					        <?php foreach ($categorys as $i => $category): ?>
								<tr>
									<td><?php echo $category['0'] ?></td>
									<td><?php echo $category['1'] ?></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="4" align="center" style="padding: 20px;"><a href="addCategory.php" style="font-size: 30px; padding: 5px; background-color: #99cc33;">Add Category</a></td>
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
