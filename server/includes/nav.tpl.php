
<nav id="nav">
  <div class="navbar">
    <div class="brand"><a href="index.php">routr</a></div>
    <ul>
      <?php
        session_start();
        if (!isset($_SESSION['logged_in'])) {
            echo('<li id="active"><a href="#" id="user">
                  <i class="material-icons user-icon">person</i>
                  <strong>Login/Failed</strong></a>
              </li>');
          } else {
            echo('<li id="active"><a href="#" id="user">
                  <i class="material-icons user-icon">person</i>
                  <strong> '.$_SESSION["username"].' </strong></a>
              </li>');
          }
      ?>
<!--      <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong>-->
<!--            Login </strong></a>-->
<!--      </li>-->
      <li><a href="registration.php">Register</a></li>
      <li><a href="search.php">Find Wifi</a></li>
    </ul>
  </div>
</nav> <!-- navigation -->
