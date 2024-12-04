<?php require_once('../../../private/initialize.php');
require_login();
$page_title = 'Edit Edit Subject';
include(SHARED_PATH . '/staff_header.php');

if (!isset($_GET['id'])) {
    redirect_to(location: '/staff/subjects/index.php');
}

$id = $_GET['id'];

if (is_post_request()) {
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = update_subject($subject);
    if ($result === true) {
        $_SESSION['message'] = 'The subject was updated successfully.';
        redirect_to('/staff/subjects/show.php?id=' . $id);
    } else {
        $errors = $result;
    }
} else {
    $subject = find_subject_by_id($id); // Find all Subjects
}
$subject_set = find_all_subjects(); //Asign it to the subject_set
$subject_count = mysqli_num_rows($subject_set); // return the count of subjects into subject_count
mysqli_free_result($subject_set); //Free results
?>

<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo; Back to List</a>
    <h1 class="mt-4">Edit Subject</h1>

    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . hu($id)); ?>" method="post">
        <div class="form-group">
            <label class="fs-4 me-3" for="menu_name">Menu Name</label>
            <input type="text" class="w-25" name="menu_name" value="<?php echo h($subject['menu_name']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['menu_name'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <label class="fs-4 me-5" for="position">Position</label>
            <select class="ms-3" name="position">
                <?php
                for ($i = 1; $i <= $subject_count; $i++) {
                    echo "<option value=\"{$i}\"";
                    if ($subject['position'] == $i) {
                        echo "selected";
                    }
                    echo ">{$i}</option>";
                }
                ?>
            </select>
            <span class="text-danger ms-3"><?php echo $errors['position'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <label class="fs-4 me-4 pe-2" for="visible">Visible</label>
            <input type="hidden" name="visible" value="0">
            <input class="form-check-input ms-5 px-2" type="checkbox" name="visible" value="1" <?php if ($subject['visible'] == "1") {
                                                                                                    echo "checked";
                                                                                                } ?>>
            <span class="text-danger ms-3"><?php echo $errors['visible'] ?? '' ?></span>
        </div>
        <label class=" me-5 pe-5" for="submit"></label>
        <input type="submit" value="Edit Subject" class="btn btn-primary ms-5"></input>
    </form>

</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>