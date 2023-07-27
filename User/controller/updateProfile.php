<?php
	require_once '../model/customermodel.php';
	$error_profile = "";
	$profile="";

if (isset($_POST['ChangeProfilePicture'])) {
	require_once 'customerinfo.php';
	$user = fetchCustomerById($_REQUEST['id']);


	$profile = basename($_FILES["profile"]["name"]);


	$data['profile'] = basename($_FILES["profile"]["name"]);

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
	else{
		if (updateCustomerProfilepic($_POST['id'], $data)) {
			move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
		  	header('Location:profile.php');
		}
	}
	
}

?>