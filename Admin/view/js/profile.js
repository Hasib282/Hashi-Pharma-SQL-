function validateForm(){    
	var u = document.profileedit.uname.value;    
	var n = document.profileedit.name.value;    
	var e = document.profileedit.email.value;  
  
	var namepattern = /^[a-zA-Z][a-zA-Z\-\.\s]*$/;
	

	if (u==null || u == ""){   
		alert("*Username is required");
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
	else if(e == null || e == ""){
		alert("*Email is required");
		email.focus();
		return false;
	}
	else{
		alert('Your Profile has been updated successfully. Please Login again.');
	}
}




function checkUname() {
	var u = document.getElementById("uname").value;

	if (u == "") {
		document.getElementById("uname_error").innerHTML = "*Username is required";
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
		phone.focus();
	}
	else{
		document.getElementById("email_error").innerHTML = "";
		document.getElementById("email").style.borderColor = "black";
	}
			
}




