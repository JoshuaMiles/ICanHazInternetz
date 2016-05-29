function validatePassword() {
  var password = document.userForm.password,
    confirmPassword = document.userForm.confirmPassword;
  // check if the passwords are equal
  if (password.value != confirmPassword.value) {
    password.value = "", confirmPassword.value = "";
    password.focus();
    return false;
  }
  return true;

}
