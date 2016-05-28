<?php
error_reporting(-1);
ini_set('display_errors', 1);

include("postMaster.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {


  $email = getPost($_POST['email']);
  $firstName = getPost($_POST['firstName']);
  $lastName = getPost($_POST['lastName']);
  $phone = getPost($_POST['phone']);
  $password = getPost($_POST['password']);

  require_once('user.php');
  //User email needed
  $user = new User($email);
  if ($user->register($email, $firstName, $lastName, $phone, $password)) {
    echo 'Registered'; // add in msg or notification to say registered
    header("Location: index.php");
    exit();
  } else {
    echo 'Error during registration'; // add error msg
    header("Refresh: 0");
  }
}
?>
