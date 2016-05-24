<?php include 'server/PHP/signup.php'; ?>
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
<header>
    <div class="branding"> <!--wrapper -->
        <div id="brand-group">
            <div class="logo"></div>
            <h1>routr</h1>
            <p>find your local wifi</p>
        </div>
    </div>
</header> <!-- header -->
<nav id="nav">
    <div class="navbar">
        <div class="brand"><a href="index.html">routr</a></div>
        <ul>
            <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong>
                        Elliott</strong></a></li>
            <li><a href="registration.html">Register</a></li>
            <li><a href="search.html">Find Wifi</a></li>
        </ul>
    </div>
</nav> <!-- navigation -->

<main>
    <div class="overlay">
        <div class="modal">
            <p class="btn-close">
                <i class="material-icons">clear</i>
            </p>
            <h2 class="article-head">Login</h2>
            <hr class="article-title-rule">
            <form action="submit" class="login-form">
                <div class="input-group">
                    <input type="text" name="name" id="username" class="lbl-highlight">
                    <label for="firstName">First Name</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="lbl-highlight">
                    <label for="password">Password</label>
                </div>
                <a href="registration.html" class="login-notify muted">Don't have an account? Click here</a>
                <input type="submit" name="login" value="Sign in" id="login">
            </form>
        </div>
    </div> <!-- login overlay -->

    <section class="register">
        <article class="user-container"> <!--change to generic .form-container -->
            <h2 class="article-head">Sign Up</h2>
            <hr class="article-title-rule">

            <form method="POST" action="" onsubmit="return validateSubmitForm();" name="userForm" class="newUser">
                <div class="profile">
                    <img src="images/profile.jpg" width="85" height="85" alt="profile">
                </div>
                <div class="input-group">
                    <input type="text" name="firstName" id="firstName" class="lbl-highlight" pattern="([nN][0-9]{7}"
                           required>
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
                    <input type="tel" name="phone" id="phoneNum" class="lbl-highlight">
                    <label for="phoneNum">Phone Number</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="lbl-highlight">
                    <label for="password">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" name="confirmPassword" id="confirmPassword" class="lbl-highlight">
                    <label for="confirmPassword">Confirm Password</label>
                </div>
                <button type="submit" id="signup">Sign Up</button>
            </form>
        </article>
    </section> <!-- register section -->
</main>


<footer>
    <section class="container">
        <div class="brand">
            <a href="index.html"><img src="images/routr-logo-sml.png" alt="logo"/></a>
            <p class="title">routr</p>
        </div>
        <nav class="footer">
            <ul>
                <li><a href="search.html">Find Wifi</a></li>
                <li><a href="registration.html">Register</a></li>
                <li><a href="userProfile.html">Your Profile</a></li>
            </ul>
        </nav>
    </section>
    <section class="copyright">
        <article>Copyright 2016</article>
    </section>
</footer> <!-- footer -->

<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
</body>
</html>
