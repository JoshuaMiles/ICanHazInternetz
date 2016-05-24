<?php
include('databaseQueries.php');
include('pdoMaster.php');
include('postMaster.php');

if (!empty($_POST)) {
    $pdo = getPDO();

    $db = new Database($pdo);


    $email = getPost('email');
    $hotspotName = getPost('hotspotName');
    $firstName = getPost('firstName');
    $rating = getPost('rating');
    $comment = getPost('comment');

    $db->insert($email, $hotspotName, $firstName, $rating, $comment);

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