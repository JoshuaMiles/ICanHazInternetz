<?php

include('pdoMaster.php');
$pdo = getPDO();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $postEmail = $_POST['email'];
  $postPassword = $_POST['password'];

  $statement = $pdo->prepare('SELECT email, firstName, password_hash FROM hotspots.members WHERE email = ?');
  $statement->bindParam(1, $postEmail);
  $statement->execute();

  $data = $statement->fetch();

  if (!empty($data)) {
    $db_hashed_pw = $data["password_hash"];

    if (password_verify($postPassword, $db_hashed_pw)) {
      $_SESSION['logged_in'] = true;
      $_SESSION["username"] = $data["firstName"];

      header("Location:  http://{$_SERVER['HTTP_HOST']}/index.php");
      exit();
    } else {
      $error = "Login failed";
      echo 'fuck you';
    }
  }
}
?>