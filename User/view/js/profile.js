function validateForm(){    
	var n = document.profileedit.name.value;    
	var ph = document.profileedit.phone.value;  
	var g = document.profileedit.gender.value;  
	var a = document.profileedit.address.value;  
  

	var phonepattern = /^[0][1][3-9][0-9]{8}$/;
	var namepattern = /^[a-zA-Z][a-zA-Z\-\.\s]*$/;
	


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



	// phone validation
	else if(ph == null || ph == ""){
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

	else{
		alert("*Your profile has been updated successfully. Please Login again.");
	}
}




function changeProfile(){  
	var pro = document.changeprofile.profile.value;  
	if(pro == null || pro == ""){
		alert("*Profile picture is required");
		return false;
	}
	else{
		alert("*Your profile pic has been updated successfully. Please Login again.");
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


function checkPofile(){
	var p = document.getElementById("profile").value;

    if (p == "") {
		document.getElementById("profile_error").innerHTML = "*Profile is required";
	}
	else{
		document.getElementById("profile_error").innerHTML = "";
	}
}

