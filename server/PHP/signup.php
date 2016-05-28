<?php
require('requireMaster.php');

require('postMaster.php');


error_reporting(-1);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $member = new User($email);

  if ($member->register($firstName, $lastName, $email, $phone, $password)) {
    header("Location: index.php");
    exit();
  } else {
    header("Refresh: 0");
  }
}
?>
