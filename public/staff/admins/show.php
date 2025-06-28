<?php require_once('../../../private/initialize.php');
require_login();
$page_title = 'Show Admin';
include(SHARED_PATH . '/staff_header.php');
if (!isset($_GET['id'])) {
    redirect_to('/staff/admins/index.php');
}
$id = $_GET['id'] ?? '';

$admin = [];
$admin = find_admin_by_id($id);
?>

<div id="content">
    <a class="btn btn-secondary mb-3" href="<?php echo url_for('/staff/admins/index.php') ?>">&laquo; Back to List</a>
    <h1 class="my-4 fw-bold">Show Admin</h1>
    <div class="admin show">
        <h1 class="my-4 fw-bold">Admin: <?php echo h($admin['first_name']); ?></h1>
        <div class="mx-4">
            <h3>First Name: <?php echo h($admin['first_name']); ?></h3>
            <h3>Last Name: <?php echo h($admin['last_name']); ?></h3>
            <h3>Username: <?php echo h($admin['username']); ?></h3>
            <h3>Email: <?php echo h($admin['email']); ?></h3>

        </div>
    </div>


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>