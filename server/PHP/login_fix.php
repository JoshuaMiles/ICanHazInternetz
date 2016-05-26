<?php

  include('config.php'); // include db connection file
  session_start(); // session begin

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = $pdo->prepare('SELECT * FROM admins WHERE username = :username and password = SHA2(CONCAT(:password, salt), 0)');

    $qry->execute(array(
      ':username' => $username,
      ':password' => $password
    )); // run query

    if ($qry->rowCount() > 0) {
      // session_register("username"); // just 'username'?
      // session_register("password");
      // $_SESSION['logged_in'] = $username;
      $_SESSION['logged_in'] = true;

      header("Location:  http://{$_SERVER['HTTP_HOST']}/private.php");
      exit();
    }
    else {
      $error = "Login failed";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <?php include 'menu.inc'; ?>

    <form action="login.php" method="post">
      <input type="text" name="username" value="">
      <input type="password" name="password" value="">
      <input type="submit" name="login" value="Login">
    </form>

    <div class="message"><?php echo $error; ?></div>

  </body>
</html>
