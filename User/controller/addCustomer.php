<?php  

require_once '../model/customermodel.php';
require_once '../model/db_connection.php';

$uname=$name=$email=$phone=$address=$pass=$cpass=$gender=$profile=$message="";

$error_uname=$error_name=$error_email=$error_phone=$error_address=$error_pass=$error_gender=$error_cpass=$error_profile="";

if(isset($_POST["AddAdmin"]))  {
	$uname = $_REQUEST['uname'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$address = $_REQUEST['address'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$profile = basename($_FILES["profile"]["name"]);


	$data['uname'] = $uname;
	$data['name'] = $name;
	$data['email'] = $email;
	$data['phone'] = $phone;
	$data['gender'] = $gender;
	$data['address'] = $address;
	$data['pass'] = $cpass;
	$data['profile'] = basename($_FILES["profile"]["name"]);

	// User Name validation
	if($uname == null){ //null check
		$error_uname = "*User Name is required<br>";
		$uname = "";
	}
	else if(isset($uname)){
		$count = checkUsername($uname);
		if($count>0){
			$error_uname = "*Username already exists";
		}
	}

				
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


	// email validation
	if($email == null){
		$error_email= "*Email is required<br>";
		$email = "";
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error_email = "*Invalid email format";
		$email = "";
	}
	else if(isset($email)){
		$count = checkEmail($email);
		if($count>0){
			$error_email = "*Email already exists";
		}
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
		$data['gender'] = $gender;
	}



	// address validation
	if($address == null){
		$error_address = "*Address is required";
		$address = "";
	}



	// password validation
	if($pass == null){
		$error_pass = "*Password is required";
		$pass = "";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/",$pass)){
		$error_pass ="*Must contain one upper letter,lower letter,digit and special character. <br>";
	}
	else if(strlen($pass)<= 8){
		$error_pass = "*Password need to be 8 character or more <br>";
	}
	


	// confirm pass validation
	if($cpass == null){
		$error_cpass = "*Confirm Password is required";
		$cpass = "";
	}
	else if($pass != $cpass){
		$error_pass = "*Password do not match";
		$error_cpass = "*Password do not match";
		$pass = "";
		$cpass = "";
	}



	$target_dir = "../view/images/";
	$target_file = $target_dir . basename($_FILES["profile"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($profile == null){
		$error_profile = "Profile Picture is required";
	}
	// Allow certain file formats
	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  $error_profile = "Sorry, only JPG, JPEG, PNG & GIF files are allowed. </br>";
	}
	// Check file size
	else if ($_FILES["profile"]["size"] > 1000000) {
	  $error_profile = "Sorry, your file is too large.</br>";
	}
	// Check if file already exists
	else if (file_exists($target_file)) {
	  $error_profile = "Sorry, filename already exists.</br>";
	}




	


	if($error_uname=="" && $error_name=="" && $error_email=="" && $error_phone=="" && $error_gender=="" && $error_address=="" && $error_pass=="" && $error_cpass=="" && $error_profile==""){
		if(isset($_SESSION['customer']))
		{
			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
			addcustomer($data);
	  		header('location:../view/addAdmin.php');
	  	}
	  	else{
	  		move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
			addcustomer($data);
	  		header('location:../view/registration.php');
	  		session_start();
	  		$_SESSION['success'] = 'Registration Successful';
	  	}
  	}

} 
else if(isset($_POST["reset"]))  {
	$name=$email=$phone=$pass=$cpass=$date=$gender=$degree=$blood=$degrees=$message="";
}





?> 