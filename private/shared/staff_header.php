<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="<?php echo url_for('images/favicon.ico'); ?>" type=" image/ico">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home Brew Corp
        <?php isset($page_title) ?:  $page_title = " | Staff Area";
        echo "| " . h($page_title); ?>
    </title>
</head>

<body>
    <?php isset($page_theme) ?: $page_theme = 'primary'; ?>
    <?php if (str_contains($page_title, "Page")) {
        $page_theme = 'success';
    } elseif (str_contains($page_title, "Admin")) {
        $page_theme = 'secondary';
    }

    ?>

    <header class="<?php echo "bg-" . $page_theme ?>">
        <h1>Home Brew Corp</h1>
    </header>
    <navigation>
        <ul> <?php if (is_logged_in()) { ?>
                <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
                <li><a class="btn btn-<?php echo $page_theme ?>" href="<?php echo url_for('/staff/index.php') ?>">Menu</a></li>
                <li><a class="btn btn-danger" href="<?php echo url_for('/staff/logout.php') ?>">Logout</a></li>
            <?php } ?>
        </ul>
    </navigation>
    <?php
    display_session_message();
