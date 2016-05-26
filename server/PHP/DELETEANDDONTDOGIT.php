<?php
include("databaseQueries.php");
include("pdoMaster.php");

$db = new Database(getPDO());
$test = $db::searchQuery("","","","4000");
echo $test;
?>
