<?php
  include("postMaster.php");
  include("user.php");

  $error = array();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = getPost('email');
    $password = getPost('password');
    $pdo = getPDO();

    // Gets database object
    $login = new User($pdo);
    // Call login function with the appropriate email and password
    $login->login($email, $password);
  }
?>
