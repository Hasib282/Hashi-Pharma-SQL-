<?php


require_once '../model/customermodel.php';
require_once '../model/db_connection.php';

if(isset($_POST["addtocart"]))  {
	$cid = $_REQUEST['cid'];
	$pid = $_REQUEST['pid'];

	$data['cid'] = $cid;
	$data['pid'] = $pid;
	

	if(isset($cid)){
		$count = showCartbyId($pid,$cid);
		if($count>0){
			$data['quantity'] = $count[2] + 1;
			updateCart($pid,$cid, $data);
			echo '<script>alert("Add to cart Successfully.");</script>';

		}
		else{
			$data['quantity'] = 1;
			addCart($data);
			echo '<script>alert("Add to cart Successfully.");</script>';
		}
	}
}
if(isset($_POST["add"])) {
	echo '
	<script type="text/javascript">
	alert("Please login first to add item. \nThank you :)");
	window.location.href="../view/login.php";
	</script>';
	// header('location:');
	
}






?>