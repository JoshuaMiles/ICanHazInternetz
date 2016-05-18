<?php
  error_reporting(-1);
  ini_set('display_errors', 1);

  session_start();
  include_once("pdo.php");
  include("postMaster.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $email = $_POST['email'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      $pdo = getPDO();
      require_once 'user.php';
      $user = new USER($pdo);
      if($user->register($email,$firstName,$lastName,$phone,$password)){
          header("Location: index.html");
          exit();
      } else {
          // header("Location: .php");
          echo "Not lit";
      }

  }
?>
