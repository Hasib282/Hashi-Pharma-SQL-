<?php  


require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$uname=$name=$email=$pass=$cpass=$status=$message="";

$error_uname=$error_name=$error_email=$error_pass=$error_cpass="";

if(isset($_POST["AddAdmin"])) {
	$uname = $_REQUEST['uname'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$status = $_POST['status'];


	$data['uname'] = $uname;
	$data['name'] = $name;
	$data['email'] = $email;
	$data['pass'] = $pass;
	$data['status'] = $status;

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


	if($error_uname=="" && $error_name=="" && $error_email=="" && $error_pass=="" && $error_cpass=="" ){
		if(isset($_SESSION['admin']))
		{
			addAdmin($data);
	  		header('location:../view/adminlist.php');
	  		echo '<script>alert("Successfully Added.");</script>';
	  	}
	  	else{
			addAdmin($data);
	  		header('location:../view/registration.php');
	  		echo '<script>alert("Registration successfully.");</script>';
	  	}
  	}

} 
else if(isset($_POST["reset"]))  {
	$name=$email=$phone=$pass=$cpass=$date=$gender=$degree=$blood=$degrees="";
}





?> 