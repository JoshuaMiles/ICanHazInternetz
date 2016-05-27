<?php
  include('server/PHP/pdoMaster.php');
  $pdo = getPDO();
  $error = '';
  $db_hashed_pw = '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $postEmail = $_POST['email'];
    $postPassword = $_POST['password'];

    $statement = $pdo->prepare('SELECT email, firstName, password_hash FROM hotspots.members WHERE email = ?');
    $statement->bindParam(1, $postEmail);
    $statement->execute();

    $data = $statement->fetch();

    if (!empty($data)) {
      $db_hashed_pw = $data["password_hash"];
    }
    if (password_verify($postPassword, $db_hashed_pw)) {
      $_SESSION['logged_in'] = true;
      $_SESSION["username"] = $data["firstName"];

      echo 'You have entered valid use name and password';

      // header("HTTP/1.1 200 OK");
      exit();

    } else {
      // header("HTTP/1.1 401 Unauthorised");
      $error = "Incorrect username or password";
      exit();
    }
  }
?>
<h2 class="article-head">Login</h2>
<hr class="article-title-rule">

<div class="modal">
  <form method="POST" action="index.php" class="login-form">
    <span><?php echo $error; ?></span>
    <div class="input-group">
      <input type="email" name="email" id="username" class="lbl-highlight">
      <label for="firstName">Email</label>
    </div>
    <div class="input-group">
      <input type="password" name="password" id="password" class="lbl-highlight">
      <label for="password">Password</label>
    </div>
    <a href="registration.php" class="login-notify muted">Don't have an account? Click here</a>
    <input type="submit" name="login" value="Sign in" id="login">
  </form>
</div>
