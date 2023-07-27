<?php
	require_once '../model/customermodel.php';
	$error_cpass =$error_npass =$error_cnpass = $msg = "";
	$cpass=$npass=$cnpass=$currpass="";

if (isset($_POST['changepass'])) {

	$currpass = $customer[7];
	$cpass = $_REQUEST['cpass'];
	$npass = $_REQUEST['npass'];
	$cnpass = $_REQUEST['cnpass'];

	$data['Password'] = $cnpass;

	if($cpass==null){
		$error_cpass = "*Input Field can not be empty";
	}
	else if($cpass != $currpass){
		$error_cpass = "*Current password is wrong";
	}



	if($npass == null){
		$error_npass = "*New Password can not be empty";
	}
	else if($npass == $cpass){
		$error_npass = "*Newpass can not be same as old pass";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/",$npass)){
		$error_npass ="*Must contain one upper letter,lower letter,digit and special character. <br>";
	}
	else if(strlen($npass)<= 8){
		$error_npass = "*Password need to be 8 character or more <br>";
	}




	
	if($cnpass == null){
		$error_cnpass = "*Confirm Password can not be empty";
	}
	else if($npass != $cnpass){
		$error_cnpass = "*Password doesn't match";
	}
	
	if($error_cpass=="" && $error_npass=="" && $error_cnpass==""){
		if (updateCustomerPass($customer[0], $data)) {
			header('location:profile.php');
		}
	}
	
}

?>