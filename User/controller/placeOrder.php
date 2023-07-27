<?php
require_once '../model/customermodel.php';
if(isset($_POST['order'])){
$price = "price";
$q = "quantity";


if(!isset($_REQUEST['cart'])){
	echo '<script>
	alert("Select an item first.");
	</script>';
	
}
else{
	$cid = $_REQUEST['customer'];
	$pid = $_REQUEST['cart'];
	$pp = $_REQUEST[$price.''.$pid];
	$quantity = $_REQUEST[$q.''.$pid];
	$total = $pp * $quantity;

	$data['cid'] = $cid;
	$data['pid'] = $pid;
	$data['pp'] = $pp;
	$data['quantity'] = $quantity;
	$data['total'] = $total;
	$data['status'] = "Ordered";
	addOrder($data);
	deleteCart($pid,$cid);
	updateProductStock($pid, $data);
	echo '<script>alert("Order Placed Successfully.");</script>';
}


}







?>