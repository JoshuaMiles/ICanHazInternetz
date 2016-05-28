<?php
require('Database.php');
require('postMaster.php');

$database = new Database();
$db = $database->getPDO();

require('user.php');


error_reporting(-1);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $email = getPost($_POST['email']);
  $firstName = getPost($_POST['firstName']);
  $lastName = getPost($_POST['lastName']);
  $phone = getPost($_POST['phone']);
  $password = getPost($_POST['password']);
  $user = new User($email);

  if ($user->register($firstName, $lastName, $email, $phone, $password)) {
    header("Location: index.php");
    exit();
  } else {
    header("Refresh: 0");
  }
}
?>
