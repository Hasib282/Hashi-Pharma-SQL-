function validateForm(){   
	var cp = document.changepass.cpass.value;  
	var np = document.changepass.npass.value;  
	var cnp = document.changepass.cnpass.value;  
 

	var password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/;
	

	// password validation
  if(cp == null || cp == ""){
		alert("*Password is required");
		cpass.focus();
		return false;
	}
	


	// password validation
	else if(np == null || np == ""){
		alert("*Password is required");
		npass.focus();
		return false;
	}
	else if(np.length<8){
		alert("*Password need to be 8 character or more");
		npass.focus();
		return false;
	}
	else if(!password.test(np)){
		alert("*Must contain one upper letter,lower letter,digit and special character.");
		npass.focus();
		return false;
	}


	// confirm pass validation
	else if(cnp == null || cnp == ""){
		alert("*Confirm Password is required");
		cnpass.focus();
		return false;
	}
	else if(np != cnp){
		alert("*Password do not match");
		cnpass.focus();
		return false;
	}

}


function checkCurrentPass(){
	var cp = document.getElementById("cpass").value;

    if (cp == "") {
		document.getElementById("cpass_error").innerHTML = "*Current Password is required";
		document.getElementById("cpass").style.borderColor = "red";
		cpass.focus();
	}
	else{
		document.getElementById("cpass_error").innerHTML = "";
		document.getElementById("cpass").style.borderColor = "black";
	}
}



function checkNewPass(){
	var np = document.getElementById("npass").value;
	var cp = document.getElementById("cpass").value;
	var password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]*$/;

  if (np == "") {
		document.getElementById("npass_error").innerHTML = "*Password is required";
		document.getElementById("npass").style.borderColor = "red";
		npass.focus();
	}
	else if(np.length<8){
		document.getElementById("npass_error").innerHTML = "*Password need to be 8 character or more";
		document.getElementById("npass").style.borderColor = "red";
		npass.focus();
	}
	else if(!password.test(np)){
		document.getElementById("npass_error").innerHTML = "*Must contain one upper letter,lower letter,digit and special character.";
		document.getElementById("npass").style.borderColor = "red";
		npass.focus();
	}
	else if(np == cp){
		document.getElementById("npass_error").innerHTML = "*Newpass can not be same as old pass";
		document.getElementById("npass").style.borderColor = "red";
		npass.focus();
	}
	else{
		document.getElementById("npass_error").innerHTML = "";
		document.getElementById("npass").style.borderColor = "black";
	}
}

function checkConfirmNewPass(){
	var np = document.getElementById("npass").value;
	var cnp = document.getElementById("cnpass").value;

    if (cnp == "") {
		document.getElementById("cnpass_error").innerHTML = "*Confirm Password is required";
		document.getElementById("cnpass").style.borderColor = "red";
		cnpass.focus();
	}
	else if(cnp != np){
		document.getElementById("cnpass_error").innerHTML = "*Password do not match";
		document.getElementById("cnpass").style.borderColor = "red";
		cnpass.focus();
	}
	else{
		document.getElementById("cnpass_error").innerHTML = "";
		document.getElementById("cnpass").style.borderColor = "black";
	}
}


