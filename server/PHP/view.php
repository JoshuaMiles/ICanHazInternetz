<?php
session_start();
if (isset($_SESSION['username'])){
	echo "*kisses feet* Welcome, " . $_SESSION['username']; } else {
		echo 'Fuck off';
	}


?>