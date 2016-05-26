<?php
  include("pdoMaster.php");
  include("postMaster.php");
  include("user.php");

  // $errors = array();

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = getPost('email');
    $password = getPost('password');
    $pdo = getPDO();

    // Gets database object
    $login = new User($pdo);
    // Call login function
    $login->login($email, $password);

    // if (!isset($email)) {
    //   $error[] = 'please enter email address';
    // }
    // if (!isset($password)) {
    //   $error[] = 'please enter password';
    // }
  }
?>
