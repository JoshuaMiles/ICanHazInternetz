<?php
  error_reporting(-1);
  ini_set('display_errors', 1);

  include("postMaster.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $email = $_POST['email'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];

      require_once('user.php');
    //User email needed
      $user = new User($email);
      if ($user->register($email, $firstName, $lastName, $phone, $password)) {
          echo 'Registered'; // add in msg or notifcation to say registered
          header("Location: index.php");
          exit();
      } else {
          echo 'Error during registration'; // add error msg
          header("Refresh: 0");
      }
  }
?>
