<?php
  include('Database.php');
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
