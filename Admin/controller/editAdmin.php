<?php 

require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$id=$status="";

$error_status="";


if (isset($_POST['editAdmin'])) {

	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];


	$data['id'] = $id;
	$data['status'] = $status;

		
	// User Name validation
	if($status == null){ //null check
		$error_status = "*Status is required<br>";
	}


	

	if($error_status == "" ){
		changeStatus($data);
		header('location:adminlist.php');
  	}
}
?>