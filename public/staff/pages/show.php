<?php require_once('../../../private/initialize.php');
require_login();
?>
<?php $id = $_GET['id'] ?? '1'; ?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php $page_title = 'Show Page';
$page = [];
$page = find_page_by_id($id);
$subject = find_subject_by_id($page['subject_id']);


?>
<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/show.php?id=' . hu($page['subject_id'])) ?>">&laquo; Back to Subject Page</a> <a class="btn btn-success ms-2" href="<?php echo url_for('/index.php?id=' . h($id) . '&preview=true'); ?>" target="_blank"> <i class="fa-solid fa-eye"></i>
        PREVIEW</a>

    <div class="page show">
        <h1 class="my-4 fw-bold">Page: <?php echo h($page['menu_name']); ?></h1>
        <div class="mx-4">
            <h3>Subject: <?php echo h($subject['menu_name']); ?></h3>
            <h3>Menu Name: <?php echo h($page['menu_name']); ?></h3>
            <h3>Position: <?php echo h($page['position']); ?></h3>
            <h3>Visible: <?php echo $page['visible'] === '1' ? 'true' : 'false' ?></h3>
            <h3>Image: <?php echo h($page['image']); ?></h3>
            <h3>Content: <?php echo h($page['content']); ?></h3>

        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>