// function to check that the field is not empty
function checkRequired(iControlID){
	var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(oControl.value.length == 0) {
		oControl.previousElementSibling.innerHTML = 'Required';
	}else{
		oControl.previousElementSibling.innerHTML = '';
		bVerified = true;
	}

	return bVerified; // return whether verified or not
}

// function to verify the input is a name
function checkName(iControlID){
	var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(iControlID)){

		var reName = new RegExp("[^a-zA-Z]");
		var bResult = reName.test(oControl.value.trim());
		if(bResult){
			oControl.previousElementSibling.innerHTML = 'Invalid name';
		}else{
			oControl.previousElementSibling.innerHTML = '';
			bVerified = true;
		}

	}

	return bVerified;

}

// function to verify the input is an email address
function checkEmail(iControlID){
	var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(iControlID)){

		var reEmail = new RegExp("^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$");
		var bResult = reEmail.test(oControl.value.trim())
		if(!bResult){
			oControl.previousElementSibling.innerHTML = 'Invalid email';
		}else{
			oControl.previousElementSibling.innerHTML = '';
			bVerified = true;
		}

	}

	return bVerified;
}

// function to check that the confirmed password is the same as the first
function checkConfirmPassword(iConfirmPasswordID,iOriginalPasswordID){
	var oConfirmPassword = document.getElementById(iConfirmPasswordID);
	var oOriginalPassword = document.getElementById(iOriginalPasswordID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(iConfirmPasswordID)){

		if(oConfirmPassword != oOriginalPassword){
			oConfirmPassword.previousElementSibling.innerHTML = 'Not identical';
		}else{
			oConfirmPassword.previousElementSibling.innerHTML = '';
			bVerified = true;
		}

	}

	return bVerified;
}

function checkSubmit(){
	var bVerified = false;

	var aInputs = document.getElementsByTagName('form')[0].elements;
	var oSpanTest = document.getElementById('spantest');


	oSpanTest.innerHTML = aInputs.length-2; // -fieldset and submit button

	return bVerified;
}

window.onload = function(){
	
	var oRegistrationForm = document.getElementById("register");
	if(oRegistrationForm){
		oRegistrationForm.onsubmit = function(){
			return checkSubmit();

		};
	};
};

function indexHover(){
	
}