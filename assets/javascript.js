// function to check that the field is not empty
function checkRequired(oControl){
	//var oControl = document.getElementById(iControlID);
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
function checkName(oControl){
	//var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(oControl)){

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
function checkEmail(oControl){
	//var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(oControl)){

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
function checkConfirmPassword(oConfirmPassword,oOriginalPassword){
	//var oConfirmPassword = document.getElementById(iConfirmPasswordID);
	//var oOriginalPassword = document.getElementById(iOriginalPasswordID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(oConfirmPassword)){

		if(oConfirmPassword != oOriginalPassword){
			oConfirmPassword.previousElementSibling.innerHTML = 'Not identical';
		}else{
			oConfirmPassword.previousElementSibling.innerHTML = '';
			bVerified = true;
		}

	}

	return bVerified;
}

// function to verify the input is numerics only
function checkNumeric(oControl){
	//var oControl = document.getElementById(iControlID);
	var bVerified = false; // variable whether verified or not

	if(checkRequired(oControl)){

		var reName = new RegExp("[0-9]");
		var bResult = reName.test(oControl.value.trim());
		if(!bResult){
			oControl.previousElementSibling.innerHTML = 'Numerics only';
		}else{
			oControl.previousElementSibling.innerHTML = '';
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
	
	// var oRegistrationForm = document.getElementById("register");
	// if(oRegistrationForm){
	// 	oRegistrationForm.onsubmit = function(){
	// 		return checkSubmit();

	// 	};
	// };

	var oRequiredInput = document.getElementsByTagName('textarea');
	for(iCount=0;iCount<oRequiredInput.length;iCount++){
		oRequiredInput[iCount].onblur = function(){
			checkRequired(this);
		};
	};

	var oRequiredInput = document.getElementsByClassName('required');
	for(iCount=0;iCount<oRequiredInput.length;iCount++){
		oRequiredInput[iCount].onblur = function(){
			checkRequired(this);
		};
	};

	var oEmailInput = document.getElementsByClassName('email');
	for(iCount=0;iCount<oEmailInput.length;iCount++){
		oEmailInput[iCount].onblur = function(){
			checkEmail(this);
		};
	};
	

	var oNameInput = document.getElementsByClassName('name');
	for(iCount=0;iCount<oNameInput.length;iCount++){
		oNameInput[iCount].onblur = function(){
			checkName(this);
		};
	};

	var oConfirmPasswordInput = document.getElementsByClassName('confirmPassword');
	for(iCount=0;iCount<oConfirmPasswordInput.length;iCount++){
		oConfirmPasswordInput[iCount].onblur = function(){
			checkConfirmPassword(this);
		};
	};

	var oNumericInput = document.getElementsByClassName('numeric');
	for(iCount=0;iCount<oNumericInput.length;iCount++){
		oNumericInput[iCount].onblur = function(){
			checkNumeric(this);
		};
	};



};