<?php
  //include('server/PHP/pdoMaster.php');
  // $pdo = getPDO();
  // $db_hashed_pw = '';
  $error = '';

   // Check if form has been submitted and if fields not empty
   if (isset($_POST['login']) && !empty($_POST['email'])
      && !empty($_POST['password'])) {

      //Set the post variables to check against db
      $postEmail = $_POST['email'];
      $postPassword = $_POST['password'];

      // Prepare query
      $statement = $pdo->prepare('SELECT email, firstName, password_hash FROM hotspots.members WHERE email = ?');
      $statement->bindParam(1, $postEmail);
      $statement->execute();

      $data = $statement->fetch();

      // Change to check if password and username in db
      if (!empty($data)) {
        $db_hashed_pw = $data["password_hash"];
      }

      if (password_verify($postPassword, $db_hashed_pw)) {
        $_SESSION['logged_in'] = true;
        $_SESSION["username"] = $data["firstName"];

        echo 'Logged in';
        //refresh page and change login to username
        exit();
      } else {
        $error = 'Incorrect email address or password';
      }
   }
 ?>

<h2 class="article-head">Login</h2>
<hr class="article-title-rule">

<div class="modal">
  <form method="POST" action="test-login.php" class="login-form">
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
