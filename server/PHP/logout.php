<?php
session_start();
session_destroy();
header("Location:../../index.php"); //to redirect back to "index.php" after logging out
exit();
?>
