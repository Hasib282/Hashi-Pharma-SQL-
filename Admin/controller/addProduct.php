<?php
require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$name=$price=$catagory=$manufacturer=$stock=$expiry=$image="";
$error_name=$error_price=$error_catagory=$error_manufacturer=$error_stock=$error_expiry=$error_image="";


if(isset($_POST["AddProduct"]))  {
	$name = $_REQUEST['name'];
	$price = $_REQUEST['price'];
	$catagory = $_REQUEST['catagory'];
	$manufacturer = $_REQUEST['manufacturer'];
	$stock = $_POST['stock'];
	$image = basename($_FILES["image"]["name"]);


	$data['name'] = $name;
	$data['price'] = $price;
	$data['catagory'] = $catagory;
	$data['manufacturer'] = $manufacturer;
	$data['stock'] = $stock;
	$data['image'] = basename($_FILES["image"]["name"]);



	if($name == null){ //null check
		$error_name = "*Name is required<br>";
	}


	if($name == null){ //null check
		$error_name = "*Name is required<br>";
	}


	if($price == null){ //null check
		$error_price = "*price is required<br>";
	}


	if($catagory == null){ //null check
		$error_catagory = "*catagory is required<br>";
	}


	if($manufacturer == null){ //null check
		$error_manufacturer = "*Manufacturer is required<br>";
	}

	if($stock == null){ //null check
		$error_stock = "*Stock is required<br>";
		$name = "";
	}






	$target_dir = "../view/images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($image == null){
		$error_image = "Profile Picture is required";
	}
	// Allow certain file formats
	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  $error_image = "Sorry, only JPG, JPEG, PNG & GIF files are allowed. </br>";
	}
	// Check file size
	else if ($_FILES["image"]["size"] > 1000000) {
	  $error_image = "Sorry, your file is too large.</br>";
	}
	// Check if file already exists
	else if (file_exists($target_file)) {
	  $error_image = "Sorry, filename already exists.</br>";
	}


	if($error_name == "" && $error_price == "" && $error_catagory == "" && $error_manufacturer == "" && $error_stock == "" && $error_image == ""){
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		addProduct($data);
	  	header('location:../view/productlist.php');
	}



}



?>