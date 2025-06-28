<?php
require_once('../../../private/initialize.php');
require_login();
$page_title = 'Delete Page';
include(SHARED_PATH . '/staff_header.php');
$id = $_GET['id'] ?? '';
$page = find_page_by_id($id);

if (is_post_request()) {
    delete_page($id);
    $result = delete_page($id);
    if ($result === true) {
        $_SESSION['message'] = 'The page was deleted successfully.';
        redirect_to(location: '/staff/subjects/show.php?id=' . $page['subject_id']);
    } else {
        $errors = $result;
    }
} else {
}

?>

<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/show.php?id=' . $page['subject_id']) ?>">&laquo; Back to Subject Page</a>
    <div class="page show">
        <h1 class="my-4 fw-bold">Page Delete</h1>
        <div class="mx-4">
            <h3>Are you sure you want to delete this page?</h3>
            <h3><?php echo h($page['menu_name']); ?></h3>
            <form action="<?php url_for('/staff/pages/delete.php'); ?>" method="post">
                <input class="btn btn-<?php echo $page_theme ?> ms-5" type="submit" value="Delete Page">
            </form>

        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');
