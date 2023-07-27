function validateForm(){  
	var u = document.Registration.uname.value;  
	var n = document.Registration.name.value;  
	var e = document.Registration.email.value;  
	var ph = document.Registration.phone.value;  
	var g = document.Registration.gender.value;  
	var a = document.Registration.address.value;  
	var p = document.Registration.pass.value;  
	var cp = document.Registration.cpass.value;  
	var pro = document.Registration.profile.value;  

	var password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/;
	var phonepattern = /^[0][1][3-9][0-9]{8}$/;
	var namepattern = /^[a-zA-Z][a-zA-Z\-\.\s]*$/;
	



	if(u == null || u == ""){ //null check
		alert("*User Name is required");
		uname.focus();
		return false;
	}
	// else if(isset($uname)){
	// 	$count = checkUsername($uname);
	// 	if($count>0){
	// 		$error_uname = "*Username already exists";
	// 	}
	// }


	// Name validation
	if (n==null || n == ""){   
		alert("*Name is required");
		name.focus();
		return false;  
	}
	else if (n.length<2){
		alert("*Name must contain two words");
		name.focus();
		return false;
	}
	else if(!namepattern.test(n)){
		alert("*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter");
		name.focus();
		return false;
	}



	// email validation
	if(e == null || e == ""){
		alert("*Email is required");
		email.focus();
		return false;
	}
	// else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	// 	$error_email = "*Invalid email format";
	// 	$email = "";
	// }
	// else if(isset($email)){
	// 	$count = checkEmail($email);
	// 	if($count>0){
	// 		$error_email = "*Email already exists";
	// 	}
	// }



	// phone validation
	if(ph == null || ph == ""){
		alert("*Phone is required");
		phone.focus();
		return false;
	}
	else if(!phonepattern.test(ph)){
		alert("*Phone number must be and 11 digit.");
		phone.focus();
		return false;
	}



	// gender validation
	else if(g == null || g == ""){
		alert("*Gender is required");
		return false;
	}




	// address validation
	else if(a == null || a == ""){
		alert("*Address is required");
		address.focus();
		return false;
	}






	// password validation
	else if(p == null || p == ""){
		alert("*Password is required");
		pass.focus();
		return false;
	}
	else if(p.length<8){
		alert("*Password need to be 8 character or more");
		pass.focus();
		return false;
	}
	else if(!password.test(p)){
		alert("*Must contain one upper letter,lower letter,digit and special character.");
		pass.focus();
		return false;
	}

	


	// confirm pass validation
	else if(cp == null || cp == ""){
		alert("*Confirm Password is required");
		cpass.focus();
		return false;
	}
	else if(p != cp){
		alert("*Password do not match");
		cpass.focus();
		return false;
	}




	// $target_dir = "../view/images/";
	// $target_file = $target_dir . basename($_FILES["profile"]["name"]);
	// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	else if(pro == null || pro == ""){
		alert("*Profile picture is required");
		return false;
	}
	// Allow certain file formats
	// else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	// && $imageFileType != "gif" ) {
	//   $error_profile = "Sorry, only JPG, JPEG, PNG & GIF files are allowed. </br>";
	// }
	// // Check file size
	// else if ($_FILES["profile"]["size"] > 1000000) {
	//   $error_profile = "Sorry, your file is too large.</br>";
	// }
	// // Check if file already exists
	// else if (file_exists($target_file)) {
	//   $error_profile = "Sorry, filename already exists.</br>";
	// }
}

function checkUserName(){
	var username = document.getElementById("uname").value;

	if (username == "") {
		document.getElementById("uname_error").innerHTML = "*User Name is required";
		document.getElementById("uname").style.borderColor = "red";
		uname.focus();
	}
	else{
		document.getElementById("uname_error").innerHTML = "";
		document.getElementById("uname").style.borderColor = "black";
	}
			
}


function checkName() {
	var namepattern = /^[a-zA-Z][a-zA-Z\-\.\s]*$/;
	var n = document.getElementById("name").value;

	if (n == "") {
		document.getElementById("name_error").innerHTML = "*Name is required";
		document.getElementById("name").style.borderColor = "red";
		name.focus();
	}
	else if (n.length<2){
		document.getElementById("name_error").innerHTML = "*Name must contain two words";
		document.getElementById("name").style.borderColor = "red";
		name.focus();
	}
	else if(!namepattern.test(n)){
		document.getElementById("name_error").innerHTML = "*Only contain a-z or A-Z or dot(.) or dash(-) and must start with a letter";
		document.getElementById("name").style.borderColor = "red";
		name.focus();
	}
	else{
		document.getElementById("name_error").innerHTML = "";
		document.getElementById("name").style.borderColor = "black";
	}
			
}

function checkEmail() {
	var e = document.getElementById("email").value;

	if (e == "") {
		document.getElementById("email_error").innerHTML = "*Email is required";
		document.getElementById("email").style.borderColor = "red";
		email.focus();
	}
	else{
		document.getElementById("email_error").innerHTML = "";
		document.getElementById("email").style.borderColor = "black";
	}
			
}

function checkPhone() {
	var phonepattern = /^[0][1][3-9][0-9]{8}$/;
	var p = document.getElementById("phone").value;

	if (p == "") {
		document.getElementById("phone_error").innerHTML = "*Phone is required";
		document.getElementById("phone").style.borderColor = "red";
		phone.focus();
	}
	else if(!phonepattern.test(p)){
		document.getElementById("phone_error").innerHTML = "*Phone number must be 11 digit.";
		document.getElementById("phone").style.borderColor = "red";
		phone.focus();
	}
	else{
		document.getElementById("phone_error").innerHTML = "";
		document.getElementById("phone").style.borderColor = "black";
	}
			
}


function checkGender() {
	var g = document.getElementById("gender").value;

	if (g == "") {
		document.getElementById("gender_error").innerHTML = "*Gender is required";
		document.getElementById("gender").style.borderColor = "red";
		gender.focus();
	}
	else{
		document.getElementById("gender_error").innerHTML = "";
		document.getElementById("gender").style.borderColor = "black";
	}		
}

function checkAddress() {
	var a = document.getElementById("address").value;

	if (a == "") {
		document.getElementById("address_error").innerHTML = "*Address is required";
		document.getElementById("address").style.borderColor = "red";
		address.focus();
	}
	else{
		document.getElementById("address_error").innerHTML = "";
		document.getElementById("address").style.borderColor = "black";
	}		
}


function checkPass(){
	var p = document.getElementById("pass").value;
	var password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/;

    if (p == "") {
		document.getElementById("pass_error").innerHTML = "*Password is required";
		document.getElementById("pass").style.borderColor = "red";
		pass.focus();
	}
	else if(p.length<8){
		document.getElementById("pass_error").innerHTML = "*Password need to be 8 character or more";
		document.getElementById("pass").style.borderColor = "red";
		pass.focus();
	}
	else if(!password.test(p)){
		document.getElementById("pass_error").innerHTML = "*Must contain one upper letter,lower letter,digit and special character.";
		document.getElementById("pass").style.borderColor = "red";
		pass.focus();
	}
	else{
		document.getElementById("pass_error").innerHTML = "";
		document.getElementById("pass").style.borderColor = "black";
	}
}

function checkCPass(){
	var p = document.getElementById("pass").value;
	var cp = document.getElementById("cpass").value;

    if (cp == "") {
		document.getElementById("cpass_error").innerHTML = "*Confirm Password is required";
		document.getElementById("cpass").style.borderColor = "red";
		cpass.focus();
	}
	else if(cp != p){
		document.getElementById("cpass_error").innerHTML = "*Password do not match";
		document.getElementById("cpass").style.borderColor = "red";
		cpass.focus();
	}
	else{
		document.getElementById("cpass_error").innerHTML = "";
		document.getElementById("cpass").style.borderColor = "black";
	}
}


function checkPofile(){
	var p = document.getElementById("profile").value;

    if (p == "") {
		document.getElementById("profile_error").innerHTML = "*Profile is required";
	}
	else{
		document.getElementById("profile_error").innerHTML = "";
	}
}

function reset() {
  document.getElementById("Registration").reset();
}