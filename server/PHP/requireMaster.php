<?php
// Allows you to require this file which than gives the php file access to these objects and includes
require 'server/PHP/user.php';
require('server/PHP/Database.php');

$database = new Database();
$db = $database->getPDO();
?>
