<?php
require 'server/PHP/requireMaster.php';
session_start();
$user = User::fromSession();
$hotspotName = $_GET['name'];
//  $user = new User($_SESSION['email']);
//  echo var_dump($user->isAuthed());
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>routr</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- Navigation fixed -->
<?php include('server/includes/fixedNav.tpl.php'); ?>

<main>

  <!-- Content -->
  <section>
    <article>
      <div class="container">
        <div class="item-container">

          <?php $database->sampleItemQuery($hotspotName); ?>

          <article class="comments-section">
            <h2 class="reviewTitle recommendedReviews"><span
                class="highlight">Recommend Reviews for </span> <?php echo $hotspotName; ?> </h2>
            <div class="comment-wrapper">

              <?php
                include('server/includes/comment.tpl.php');
              ?>
            </div>
            <hr/>

            <h2 id="yourReview" class="reviewTitle yourReview highlight">Your Review</h2>
            <?php include('server/includes/addReview.tpl.php'); ?>
          </article>
        </div>
      </div>
    </article>
  </section>
</main>

<!-- Footer -->
<?php include('server/includes/footer.tpl.php'); ?>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
