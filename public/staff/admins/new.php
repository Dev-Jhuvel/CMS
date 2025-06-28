<?php require_once('../../../private/initialize.php');
require_login();
$page_title = 'Create Admin';
include(SHARED_PATH . '/staff_header.php');

if (is_post_request()) {
    $admin = [];
    $admin['first_name'] = $_POST['first_name'] ?? '';
    $admin['last_name'] = $_POST['last_name'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_admin($admin);
    if ($result === true) {
        $new_id = mysqli_Insert_id($db);
        $_SESSION['message'] = 'The admin was created successfully.';
        redirect_to('/staff/admins/show.php?id=' . $new_id);
    } else {
        $errors = $result;
    }
} else {
    $admin = [];
    $admin['first_name'] = '';
    $admin['last_name'] = '';
    $admin['email'] = '';
    $admin['username'] = '';
    $admin['password'] = '';
    $admin['confirm_password'] = '';
}
?>

<div id="content">
    <a class="btn btn-secondary mb-3" href="<?php echo url_for('/staff/admins/index.php') ?>">&laquo; Back to List</a>
    <h1>Create Admin</h1>
    <form action="<?php url_for('/staff/admins/new.php') ?>" method="post" class="ps-3">
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="first_name" placeholder="First Name" value="<?php echo h($admin['first_name']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['first_name'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="last_name" placeholder="Last Name" value="<?php echo h($admin['last_name']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['last_name'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="email" name="email" placeholder="Email" value="<?php echo h($admin['email']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['email'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="text" name="username" placeholder="Username" value="<?php echo h($admin['username']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['username'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="password" name="password" placeholder="Password" value="<?php echo h($admin['password']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['password'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <input class="mb-3 p-1 rounded-3" type="password" name="confirm_password" placeholder="Confirm Password">
            <span class="text-danger ms-3"><?php echo $errors['confirm_password'] ?? '' ?></span>
        </div>
        <p>Password should be at least 12 characters and include at least one uppercase letter, lowercase letter, number and symbol.</p>
        <input type="submit" class="btn btn-primary ms-4" value="Create Admin">
    </form>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>