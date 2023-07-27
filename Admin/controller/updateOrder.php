<?php 

require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$id=$status="";

$error_status="";


if (isset($_POST['editOrder'])) {

	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];


	$data['id'] = $id;
	$data['status'] = $status;

		
	// User Name validation
	if($status == null){ //null check
		$error_status = "*Status is required<br>";
	}
	else{
		updateOrders($data);
		header('location:orderlist.php');
  	}
}
?>