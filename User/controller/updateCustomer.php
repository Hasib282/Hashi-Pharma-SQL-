<?php 


require_once '../model/customermodel.php';
require_once '../model/db_connection.php';

$uname=$name=$email=$phone=$address=$gender=$message="";

$error_uname=$error_name=$error_email=$error_phone=$error_address=$error_gender="";


if (isset($_POST['editprofile'])) {

	$name = $_REQUEST['name'];
	$phone = $_REQUEST['phone'];
	$address = $_REQUEST['address'];




	$data['name'] = $name;
	$data['phone'] = $phone;
	$data['gender'] = $_REQUEST['gender'];
	$data['address'] = $address;


				
	// Name validation
	if($name == null){ //null check
		$error_name = "*Name is required<br>";
		$name = "";
	}
	else if(strlen($name)<2){ //if less than two charecter
		$error_name = "*Name must contain two words<br>";
		$name = "";
	}
	else if(!preg_match("/^[a-zA-Z][a-zA-Z\-\.\s]*$/",$name)){
		$error_name = "*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter<br>";
		$name = "";
	}



	// phone validation
	if($phone == null){
		$error_phone = "*Phone number is required";
		$phone = "";
	}
	else if(!preg_match("/^[0][1][3-9][0-9]{8}$/",$phone)){
		$error_phone = "*Phone number must be and 11 digit.";
		$phone = "";
	}



	// gender validation
	if(!isset($_REQUEST['gender'])){
		$error_gender = "*Select your gender please";
		$gender = "";
	}
	else{
		$gender = $_REQUEST['gender'];
	}



	// address validation
	if($address == null){
		$error_address = "*Address is required";
		$address = "";
	}



	if($error_name=="" && $error_phone=="" && $error_gender=="" && $error_address==""){
		if (updateCustomerProfile($_POST['id'], $data)){
			header('location:profile.php');
		}
  	}


}
?>