<?php
require_once('../../../private/initialize.php');
require_login();

$page_title = "Delete Subject";
include(SHARED_PATH . '/staff_header.php');

if (!isset($_GET['id'])) {
    redirect_to('/staff/subjects/index.php');
}

$id = $_GET['id'];

if (is_post_request()) {
    $result = delete_subject($id);
    if ($result) {
        $_SESSION['message'] = 'The subject was deleted successfully.';
        redirect_to('/staff/subjects/index.php');
    } else {
        $errors = $result;
    }
} else {
    $subject = find_subject_by_id($id);
}
?>

<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo; Back to List</a>
    <div class="page show">
        <h1 class="my-4 fw-bold">Delete Subject</h1>
        <div class="mx-4">
            <h3>Are you sure you want to delete this subject?</h3>
            <h3> <?php echo h($subject['menu_name']); ?></h3>
            <span class="text-danger ms-3"><?php echo $errors['id'] ?? '' ?></span>
            <form class="ms-5 ps-5" action="
            <?php echo url_for('/staff/subjects/delete.php?id=' . hu(($id)));
            ?>" method="post">
                <input class="btn btn-danger ms-5" type="submit" value="Delete Subject">
            </form>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php') ?>