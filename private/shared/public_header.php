<!doctype html>

<html lang="en">

<head>
  <title>Home Brew <?php if (isset($page_title)) {
                      echo '- ' . h($page_title);
                    } ?>
    <?php if (isset($preview) && $preview) {
      echo "[PREVIEW]";
    }
    ?></title>
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico" type="image/ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />


</head>

<body>
  <header>
    <div class="nav-toggle"><i class="fa-solid fa-bars"></i></div>
    <div class="row">
      <a href="index.php">
        <img src="images/coffee-small.svg" alt="icon">
        <img src="images/text.svg" alt="icon">
      </a>
      <?php include(SHARED_PATH . '/public_navigation.php'); ?>
    </div>
  </header>