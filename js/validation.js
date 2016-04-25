var mobileRegex = new RegExp(/^\D*0(\D*\d){9}\D*$/);
var emailRegex = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
var passwordRegex = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=.\-_*])([a-zA-Z0-9@#$%^&+=*.\-_]){3,}$/);

function validateSubmitForm() {

	var fname = document.userForm.firstName,
		lname = document.userForm.lastName,
		email = document.userForm.email,
		phoneNum = document.userForm.phoneNum,
		password = document.userForm.password,
		confirmPassword = document.userForm.confirmPassword;


	if (isEmptyOrUndefined(fname.value)) {
		alert("Please provide your first name!");
		fname.focus();
		return false;
	}

	// if (isEmptyOrUndefined(lname.value)) {
	// 	alert("Please provide your first name!");
	// 	fname.focus();
	// 	return false;
	// }

	if (isEmptyOrUndefined(phoneNum.value)) {
		alert("Please provide your mobile");
		phoneNum.focus();
		return false;
	}

	if (isEmptyOrUndefined(password.value)) {
		alert("Please choose a password");
		password.focus();
		return false;
	}


	if (isEmptyOrUndefined(email.value)) {
		alert("Please provide your email");
		email.focus();
		return false;
	}

	if (checkInvalid(mobileRegex, phoneNum.value)) {
		alert("Please provide a valid mobile number");
		phoneNum.focus();
		return false;
	}



	if (checkInvalid(passwordRegex, password.value)) {
		alert("Please enter a password with with a number, a lowercase, a uppercase, and a special character");
		password.focus();
		return false;
	}


	if(password.value!=confirmPassword.value){
	 	alert("Passwords do not match please try again");
	 	password.value = "", confirmPassword.value = "";
	 	password.focus();
	}
	return true;

}

function isEmptyOrUndefined(value) {
	if (value == "" || value == undefined) {
		return true;
	}
	return false;
}



function checkInvalid(regex, toCheck) {
//	alert("here " + toCheck)
	if (!regex.test(toCheck)) {
		return true;
	}
	return false;
}
