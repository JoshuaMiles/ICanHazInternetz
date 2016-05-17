<?php 
include_once("pdo.php");
include_once ("postMaster.php");

echo get("test");

$pdo =  getPDO();
$statement = $pdo-> prepare("SELECT *
FROM `hotspots`.`hotspots`;");

$statement -> execute();

$data = $statement->fetchAll();
foreach ($data as $row) {
	echo $row["hotspot_name"]."<br>";
}
?>