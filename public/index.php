<?php require_once('../private/initialize.php'); ?>
<?php


$preview =  false;
if (isset($_GET['preview'])) {
  $preview = $_GET['preview'] === 'true' && is_logged_in() ? true : false;
}
$visible = !$preview;

if (isset($_GET['id'])) {
  $page_id = $_GET['id'];
  $subject = find_subject_by_id($page_id);
  $page = find_page_by_id($page_id, ['visible' => $visible]);
  if (!$page) {
    redirect_to('index.php');
  }
  $subject_id = $page['subject_id'];
  $subject = find_subject_by_id($subject_id, ['visible' => $visible]);
  if (!$subject) {
    redirect_to('index.php');
  }
} elseif (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
  $subject = find_subject_by_id($subject_id, ['visible' => $visible]);
  if (!$subject) {
    redirect_to('index.php');
  }
  $page_set = find_pages_by_subject_id($subject_id, ['visible' => $visible]);
  $page = mysqli_fetch_assoc($page_set);
  mysqli_free_result($page_set);
  if (!$page) {
    redirect_to('index.php');
  }
  $page_id = $page['id'];
} else {
}

?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main class="main">
  <?php
  // include(SHARED_PATH . '/public_navigation.php');
  ?>

  <div class="website-container">
    <?php
    // TODO: SUBEJCT NAME AND MENU NAME
    if (isset($page)) {
      $allowed_tags = '<div><img><h1><h2><strong><li><a><ul><br><p>';
    ?>
      <div class="hero" style=" background-image: url(<?php echo url_for('/images/uploaded_image/' . $page['image']) ?>);">
        <h1><?php echo $subject['menu_name'] ?></h1>
      </div>
      <div class="content container">
        <h1 class="page-title"><?php echo $page['menu_name'] ?></h1>

        <p><?php echo nl2br(strip_tags($page['content'], $allowed_tags)); ?></p>
      <?php

    } else {
      include(SHARED_PATH . '/static.php');
    }
      ?>

      </div>
  </div>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

<script src="script.js"></script>