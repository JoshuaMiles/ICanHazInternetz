<?php
session_start();
$_SESSION['username'] = "hello";


session_destroy();

?>