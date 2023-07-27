<?php
require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$id=$name="";
$error_name="";


if(isset($_POST["AddManufacturer"]))  {
	$name = $_REQUEST['name'];

	$data['name'] = $name;


	if($name == null){ //null check
		$error_name = "*Name is required<br>";
	}


	if($error_name == ""){
		addManufacturer($data);
	  	header('location:../view/manufacturerlist.php');
	}



}



?>