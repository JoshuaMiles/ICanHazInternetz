<?php
// Only continue if $_POST is not empty
if(!empty($_POST)){
		// prints the post that the person made and 
		print_r($_POST);
		// exits the program preventing any fluff request from continuing 
		exit;
}
// the name of the server to connect to
$servername = "localhost";
// the username of the database
$username = "root";
// the password to the database
$password = "root";

$DB_name = "user";


// attempts to make a new connection to the server given the database if the username and password are correct
$mysqli = new mysqli($servername, $username, $password, $DB_name);
 

 $sql = "INSERT INTO user ( email, first_name, last_name ) VALUES ( '{$mysqli->real_escape_string($_POST['email'])}', '{$mysqli->real_escape_string($_POST['first_name'])}', '{$mysqli->real_escape_string($_POST['last_name'])}','{$mysqli->real_escape_string($_POST['password'])}' )";





$insert = $mysqli->query($sql);

?>


<form method="post" action="">
<input name="email" type="email">
<input name="first_name" type="text">
<input name="last_name" type="text">
<input name="password" type="password">
<input type="submit" value="Submit Form">
</form>
