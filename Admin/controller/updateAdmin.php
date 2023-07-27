<?php 


require_once '../model/adminmodel.php';
require_once '../model/db_connection.php';

$uname=$name=$email=$message="";

$error_uname=$error_name=$error_email="";


if (isset($_POST['editprofile'])) {

	$uname = $_REQUEST['uname'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];


	$data['uname'] = $uname;
	$data['name'] = $name;
	$data['email'] = $email;



				
	// User Name validation
	if($uname == null){ //null check
		$error_uname = "*User Name is required<br>";
		$uname = "";
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




	if($error_uname=="" && $error_name=="" && $error_email==""){
		
		if($uname == $_SESSION['admin']){
			updateAdminProfile($_POST['id'], $data);
			header('location:profile.php');
		}
		else if(isset($uname)){
			$count = checkUsername($uname);
			if($count>0){
				$error_uname = "*Username already exists";
			}
		}

  	}


}
?>