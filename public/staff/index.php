<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Staff Menu'; ?>
<?php require_login(); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>



<div id="content">
    <div id="main-menu">
        <h2>Main Menu</h2>
        <ul class="list-unstyled d-flex flex-column">
            <li><a class="btn btn-primary mb-2" href="<?php echo url_for('/staff/subjects/index.php') ?>">Subjects</a></li>
            <!-- <li><a class="btn btn-success mb-2" href="<?php //echo url_for('/staff/pages/index.php') 
                                                            ?>">Pages</a></li> -->
            <li><a class="btn btn-secondary" href="<?php echo url_for('/staff/admins/index.php') ?>">Admins</a></li>

        </ul>
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>