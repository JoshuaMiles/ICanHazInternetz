<?php
if(!empty($_POST)){
// for testing the query to mysql

	// the name of the server to connect to
	$servername = "localhost:3306";
	// the username of the database
	$username = "root";
	// the password to the database
	$password = "root";

	$DB_name = "user_registration";


	$mysqli = new mysqli($servername, $username, $password, $DB_name);

	if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  } 

 	$checkUser = mysqli_query($mysqli, "SELECT email from user_registration.user WHERE email = $_POST['email']");

 	echo $checkUser;




?>

<form method="post" action="">
<input name="email" type="email">
<input type="submit" value="Submit Form">
</form>
