<?php
require('requireMaster.php');
require('postMaster.php');

error_reporting(-1);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = getPost($_POST['email']);
  $firstName = getPost($_POST['firstName']);
  $lastName = getPost($_POST['lastName']);
  $phone = getPost($_POST['phone']);
  $password = getPost($_POST['password']);

  $member = new User($email);

  if ($member->register($firstName, $lastName, $email, $phone, $password)) {
    header("Location: /index.php");
    exit();
  } else {
    //refreshes the page if the user couldn't register
    header("Refresh:0");
  }
}
?>
