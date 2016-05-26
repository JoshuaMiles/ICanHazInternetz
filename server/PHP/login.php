<?php
  include("pdoMaster.php");
  include("postMaster.php");
  include("user.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = getPost('email');
    $password = getPost('password');
    $pdo = getPDO();

    // Gets database object
    $login = new User($pdo);
    // Call login function
    $login->login($email, $password);

    if (!isset($email)) {
      echo 'please enter email address';
    }
    if (isset($password)) {
      echo 'please enter password';
    }
  }
?>
