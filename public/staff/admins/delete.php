<?php require_once('../../../private/initialize.php');require_login();
require_login();
$page_title = 'Delete Admin';
include(SHARED_PATH . '/staff_header.php');
if (!isset($_GET['id'])) {
    redirect_to('/staff/admins/index.php');
}
$id = $_GET['id'] ?? '';
if (is_post_request()) {
    $result = delete_admin($id);
    $_SESSION['message'] = 'The admin was deleted successfully.';
    redirect_to('staff/admins/index.php');
} else {
    $admin = find_admin_by_id($id);
}

?>

<div id="content">
    <a class="btn btn-secondary mb-3" href="<?php echo url_for('/staff/admins/index.php') ?>">&laquo; Back to List</a>

    <h1 class="fw-bold">Delete Admin</h1>
    <div class="admin show">
        <h3>Are you sure you want to delete this Admin Account?</h3>
        <h3> <?php echo h($admin['username']); ?></h3>
        <form action="<?php url_for('/staff/admins/index.php'); ?>" method="post">
            <input class="btn btn-danger" type="submit" value="Delete Admin">
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>