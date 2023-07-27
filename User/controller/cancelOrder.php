<?php

require_once '../model/customermodel.php';
if(isset($_POST['cancelorder'])){
	if(!isset($_REQUEST['order'])){
		echo '<script>
		alert("Select an order than press cancel.");
		</script>';
	}
	else{
		$id = $_REQUEST['order'];
		$data['id'] = $id;
		$data['status'] = "Cancelled";
		updateOrders($data);
		echo '<script>alert("Order canceled Successfully.");</script>';
	}
}

?>