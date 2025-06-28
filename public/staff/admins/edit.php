<?php require_once('../../../private/initialize.php');
require_login();
require_login();
$page_title = 'Edit Admin';
include(SHARED_PATH . '/staff_header.php');
if (!isset($_GET['id'])) {
    redirect_to('/staff/admins/index.php');
}
$id = $_GET['id'] ?? '';


if (is_post_request()) {
    $admin = [];
    $admin['id'] = $id;
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['last_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = update_admin($admin);
    $_SESSION['message'] = 'The admin was updated successfully.';
    redirect_to('/staff/admins/show.php?id=' . $id);
} else {
    $admin = find_admin_by_id($id);
}
?>

<div id="content">
    <a class="btn btn-secondary mb-3" href="<?php echo url_for('/staff/admins/index.php') ?>">&laquo; Back to List</a>
    <h1>Edit Admin</h1>
    <form action="<?php url_for('/staff/admins/edit.php') ?>" method="post" class="ps-3">
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="first_name" placeholder="First Name" value="<?php echo h($admin['first_name']) ?>">
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="last_name" placeholder="Last Name" value="<?php echo h($admin['last_name']) ?>">
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="email" name="email" placeholder="Email" value="<?php echo h($admin['email']) ?>">
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="username" placeholder="Username" value="<?php echo h($admin['username']) ?>">
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="password" name="confirm_password" placeholder="Confirm Password">
        </div>
        <p>Password should be at least 12 characters and include at least one uppercase letter, lowercase letter, number and symbol.</p>
        <input type="submit" class="btn btn-primary ms-4" value="Update Admin">
    </form>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>