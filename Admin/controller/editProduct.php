<?php 

require_once '../model/adminmodel.php';
require_once '../controller/adminInfo.php';
$product = fetchProductById($_REQUEST['id']);

$price=$stock=$newstock="";

$error_price=$error_stock="";


if (isset($_POST['EditProduct'])) {
	$id = $_REQUEST['id'];
	$price = $_REQUEST['price'];
	$stock = $_REQUEST['stock'];
	

	$data['price'] = $price;
	$data['stock'] = $stock;


	// User Name validation
	if($price == null){ //null check
		$error_price = "*Price is required<br>";
	}

	if($stock == null){ //null check
		$error_stock = "*Stock is required<br>";
	}



	if($error_price == "" && $error_stock == ""){
		updateProduct($id,$data);
		header('location:productlist.php');
  	}
}


?>