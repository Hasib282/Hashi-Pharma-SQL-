function validateForm(){  
	var i = document.Login.id.value;    
	var p = document.Login.pass.value;  

	if(i == null || i == ""){ //null check
		alert("*User Name or email is required");
		id.focus();
		return false;
	}


	// password validation
	else if(p == null || p == ""){
		alert("*Password is required");
		pass.focus();
		return false;
	}

}

function checkId(){
	var i = document.getElementById("id").value;

	if (i == "") {
		document.getElementById("id_error").innerHTML = "*User Name or email is required";
		document.getElementById("id").style.borderColor = "red";
		id.focus();
	}
	else{
		document.getElementById("id_error").innerHTML = "";
		document.getElementById("id").style.borderColor = "black";
	}
			
}


function checkPass(){
	var p = document.getElementById("pass").value;

    if (p == "") {
		document.getElementById("pass_error").innerHTML = "*Password is required";
		document.getElementById("pass").style.borderColor = "red";
		pass.focus();
	}
	else{
		document.getElementById("pass_error").innerHTML = "";
		document.getElementById("pass").style.borderColor = "black";
	}
}






