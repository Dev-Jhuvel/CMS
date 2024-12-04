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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>

  <header>
    <a href="<?php echo url_for('/index.php'); ?>">
      <div class="">
        <h1 class="page_name d-flex align-items-end"> <img style="width: 50px; height: 50px; margin:0 3px 5px 0;" src="<?php echo url_for('images/favicon.ico'); ?>"><?php echo $page_name; ?></h1>
      </div>

    </a>

  </header>