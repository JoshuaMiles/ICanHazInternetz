<?php
  error_reporting(-1);
  ini_set('display_errors', 1);

  require_once("pdoMaster.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $email = $_POST['email'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      $pdo = getPDO();
      require_once('user.php');
      $user = new USER($pdo);
      if ($user->register($firstName, $lastName, $email, $phone, $password)) {
          header("Location: index.php");
          exit();
      } else {
          header("Refresh: 0");
      }
  }
?>
