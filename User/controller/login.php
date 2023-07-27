<?php
require_once '../model/customermodel.php';
require_once '../model/db_connection.php';
session_start();


$error_id=$error_pass="";
								
$id=$pass=$rme=$msg="";

if (isset($_POST["customerLogin"])) {
	$id = $_REQUEST['id'];
	$pass = $_REQUEST['pass'];

	$data['id'] = $id;
	$data['pass'] = $pass;


	//UserName validation
	if($id == null){
		$error_id = "*Username/Email is required<br>";
		$id = "";
	}
									

	//password validation
	if($pass == null){
		$error_pass = "*Password is required";
		$pass = "";
	}




	if($error_id == null &&  $error_pass == null){
		//if remember me not checked
		if(isset($_REQUEST['rme']) == null){
			$count = Login($data);
			
			if($count>0){
				setcookie("id", "");
				setcookie("password", "");
				$_SESSION['customer'] = $id;
				echo "<script>
				alert('Welcome to HashiPharma.');
				window.location.href='customer.php';  
				</script>";
			}
			else{
				$msg = "Wrong username, email or password";
				$conn = null;
			} 
		}

		else{
			$count = Login($data);
			if($count>0){
				$_SESSION['customer'] = $id;
				setcookie("id", $id, time()+86400);
				setcookie("pass", $pass, time()+86400);
				setcookie("color", "skyblue", time()+86400);
				echo "<script>
				alert('Welcome to HashiPharma.');
				window.location.href='customer.php';  
				</script>";		
			}
			else{
				$msg = "Wrong username, email or password";
				$conn = null;
			} 
		}
	} 
}

?>