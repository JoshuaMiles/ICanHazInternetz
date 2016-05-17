var mobileRegex = /^(?:\+?61|0)4(?:[01]\d{3}|(?:2[1-9]|3[0-57-9]|4[7-9]|5[0-15-9]|6[679]|7[3-8]|8[1478]|9[07-9])\d{2}|(?:20[2-9]|444|52[0-6]|68[3-9]|70[0-7]|79[01]|820|890|91[0-4])\d|(?:200[0-3]|201[01]|8984))\d{4}$/;
var emailRegex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

function validateSubmitForm() {

	var fname = document.submitForm.firstName,
	 lname = document.submitForm.lastName,
	 email = document.submitForm.email,
	 mobile = document.submitForm.mobile,
	 password = document.submitForm.password,
	 confirmPassword = document.submitForm.confirmPassword;


	if (isEmptyOrUndefined(fname.value)) {
		alert("Please provide your first name!" + mobile.id);
		fname.focus();
		return false;
	} else if (true){
		alert("hello")
	} else if (isEmptyOrUndefined(lname.value)) {
		alert("Please provide your first name!");
		fname.focus();
		return false;
	} else if (isEmptyOrUndefined(email.value)) {
		alert("Please provide your email");
		email.focus();
		return false;
	} else if (!checkValidRegex(emailRegex,email.value)) {
		alert("Please provide a valid email");
		email.focus();
		return false;
	} else if(!checkValidRegex(mobileRegex,mobile.value)){
		alert("Please provide a valid mobile number");
		mobile.focus();
		return false;
	} 

	// if(password.value!=confirmPassword.value){
	// 	alert("Passwords do not match please try again");
	// 	password.value = "", confirmPassword.value = "";
	// 	password.focus();
	// }
}

function isEmptyOrUndefined(value) {
	if (value == "" || value == undefined) {
		return true;
	}
	return false;
}

function elementIsNull(value) {
	if (value == undefined) {
		return true;
	}
	return false;
}

function checkValidRegex(regex,toCheck) {
	if (regex.test(toCheck.value)) {
		return true;
	}
	return false;
}

