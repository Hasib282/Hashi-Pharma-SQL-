function validateForm(){  
	var u = document.Registration.uname.value;  
	var n = document.Registration.name.value;  
	var e = document.Registration.email.value;   
	var p = document.Registration.pass.value;  
	var cp = document.Registration.cpass.value;   

	var password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/;
	var namepattern = /^[a-zA-Z][a-zA-Z\-\.\s]*$/;
	



	if(u == null || u == ""){ //null check
		alert("*User Name is required");
		uname.focus();
		return false;
	}


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

function reset() {
  document.getElementById("Registration").reset();
}