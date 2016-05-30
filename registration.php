<?php
include 'server/PHP/signup.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>routr</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- Header -->
<?php require_once('server/includes/header.tpl.php'); ?>

<!-- Navigation -->
<?php require_once('server/includes/nav.tpl.php'); ?>

<main>

  <section class="register"> <!-- register section -->
    <article class="user-container"> <!-- wrapper for content -->

      <h2 class="article-head">Sign Up</h2>
      <hr class="article-title-rule">

      <form method="POST" action="" onsubmit="return validatePassword();" name="userForm" class="newUser">
        <div class="profile">
          <img src="images/usr-icon.png" width="85" height="85" alt="profile">
        </div>
        <div class="input-group">
          <input type="text" name="firstName" id="firstName" class="lbl-highlight">
          <label for="firstName">First Name</label>
        </div>
        <div class="input-group">
          <input type="text" name="lastName" id="lastName" class="lbl-highlight">
          <label for="lastName">Last Name</label>
        </div>
        <div class="input-group">
          <input type="email" name="email" id="email" class="lbl-highlight" required>
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="tel" name="phone" id="phoneNum" class="lbl-highlight"
                 pattern="/^\(?(?:\+?61|0)(?:(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}|4\)?[ -]?(?:(?:[01][ -]?[0-9]|2[ -]?[0-57-9]|3[ -]?[1-9]|4[ -]?[7-9]|5[ -]?[018])[ -]?[0-9]|3[ -]?0[ -]?[0-5])(?:[ -]?[0-9]){5})$/"
                 required>
          <label for="phoneNum">Phone Number</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="password" pattern="/^{7,20}$/" class="lbl-highlight" required>
          <label for="password">Password</label>
        </div>
        <div class="input-group">
          <input type="password" name="confirmPassword" id="confirmPassword" class="lbl-highlight" required>
          <label for="confirmPassword">Confirm Password</label>
        </div>
        <button type="submit" id="signup">Sign Up</button>
      </form>
    </article>
  </section> <!-- register section -->
</main> <!-- end main content section -->

<!-- Footer -->
<?php require_once('server/includes/footer.tpl.php'); ?>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
</body>
</html>
