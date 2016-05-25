<?php
  session_start();
  include("pdo.php");
  include("postMaster.php");
  include("user.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = getPost('email');
    $password = getPost('password');

    $pdo = getPDO();

    $login = new User($pdo);

    $verify = $login->login($email,$password);
  }
?>
