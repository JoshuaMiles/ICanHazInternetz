<?php
include("databaseQueries.php");
include("pdoMaster.php");

$db = new Database(getPDO());
$test = $db->searchQuery("Brisbane Square Library","","","4000");
?>
