<?php
// Only continue if $_POST is not empty
include_once("pdo.php");
include("postMaster.php");
session_start();
if (!empty($_POST)) {

    $pdo = getPDO();
    
    


//    = new PDO($servername, $username, $password, $DB_name);


}
?>


<form method="post" action="">
    <input name="email" type="email">
    <input name="firstName" type="text">
    <input name="lastName" type="text">
    <input name="phone" type="text">
    <input name="password" type="password">
    <input type="submit" value="Submit">
</form>
