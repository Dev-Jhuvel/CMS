<?php require_once('../../../private/initialize.php');
require_login();
$page_title = 'Admins';
include(SHARED_PATH . '/staff_header.php');

if (is_post_request()) {
    $result = reset_admin();
}
$admin_set = find_all_admins();
?>

<div id="content">
    <h1 class="mb-3">Admins</h1>
    <div class="d-flex justify-content-between">
        <div>
            <a class="btn btn-secondary mb-4" href="<?php echo url_for('/staff/admins/new.php') ?>">Create Admin</a>
        </div>
        <form action="<?php url_for('/staff/admins/index.php'); ?>" method="post">
            <input class="btn btn-danger" type="submit" value="Reset Admin">
        </form>
    </div>
    <table class="table">
        <tr class="bg-secondary text-white">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($admin = mysqli_fetch_assoc($admin_set)) {
        ?>
            <tr>
                <td><?php echo $admin['id'] ?></td>
                <td><?php echo $admin['first_name'] ?></td>
                <td><?php echo $admin['last_name'] ?></td>
                <td><?php echo $admin['email'] ?></td>
                <td><?php echo $admin['username'] ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo url_for('/staff/admins/show.php?id=' . $admin['id']); ?>">View</a>
                    <a class="btn btn-sm btn-success" href="<?php echo url_for('/staff/admins/edit.php?id=' . $admin['id']); ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo url_for('/staff/admins/delete.php?id=' . $admin['id']); ?>">Delete</a>

                </td>
            </tr>
        <?php }
        mysqli_free_result($admin_set);
        ?>


    </table>


</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>