<nav id="fixed-nav">
  <div id="fixed-container">
    <div class="brand"><a href="index.php">routr</a></div>
    <ul>
      <?php
        session_start();
        // On load
          echo('
            <li id="active">
              <a href="#" id="user">
                <i class="material-icons user-icon">person</i>
                <strong>Login</strong>
              </a>
            </li>
          ');
        if (!isset($_SESSION['username'])) {
            echo('
              <li id="active">
                <a href="#" id="user">
                  <i class="material-icons user-icon">person</i>
                  <strong>Login Failed</strong>
                </a>
              </li>
            ');
          } else {
            echo('
              <li>
                <a href="server/PHP/logout.php">
                  <svg id="logoutBtn" style="width:1.3em;height:1.3em;vertical-align:text-bottom;" viewBox="0 0 24 24">
                    <path fill="#FFFFFF" d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z" />
                  </svg>
                </a>
              </li>
              <li id="active">
                <a href="#" id="user">
                  <i class="material-icons user-icon">person</i>
                  <strong> '.$_SESSION["username"].' </strong>
                </a>
              </li>
            ');
          }
      ?>
      <!-- <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong> Login</strong></a></li> -->
      <li><a href="registration.php">Register</a></li>
      <li><a href="search.php">Find Wifi</a></li>
    </ul>
  </div>
</nav>
