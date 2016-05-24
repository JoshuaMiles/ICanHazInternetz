<?php
include('databaseQueries.php');
include('pdo.php');
if (!empty($_POST)) {
    $pdo = getPDO();

    $db = new Database($pdo);


    $email = $_POST['email'];
    $hotspotName = $_POST['hotspotName'];
    $firstName = $_POST['firstName'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $db->insert($email, $hotspotName, $firstName, $rating, $comment);
    echo "INSERTED !";
}

?>


<html>
<head>
    <title></title>
</head>
<body>

<form method="post" action="">
    <input name="email" type="text">
    <input name="hotspotName" type="text">
    <input name="firstName" type="text">
    <input name="rating" type="text">
    <input name="comment" type="text">
    <input type="submit" value="Submit Form">
</form>

</body>
</html>