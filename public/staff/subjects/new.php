<?php require_once('../../../private/initialize.php');
require_login();
?>
<?php $page_title = 'Create New Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php

if (is_post_request()) {
    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = 'The subject was created successfully.';
        redirect_to('/staff/subjects/show.php?id=' . $new_id);
    } else {
        $errors = $result;
    }
} else {
}
$subject_set = find_all_subjects(); //Asign it to the subject_set
$subject_count = mysqli_num_rows($subject_set) + 1; // return the count of subjects into subject_count
mysqli_free_result($subject_set); //Free results
$subject = [];
$subject['position'] = $subject_count;
?>

<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo; Back to List</a>
    <h1 class="mt-4">Create New Subject</h1>

    <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
        <div class="form-group">
            <label class="fs-4 me-3" for="menu_name">Menu Name</label>
            <input type="text" class="w-25" name="menu_name">
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
            <input class="form-check-input ms-5 px-2" type="checkbox" name="visible" value="1">
            <span class="text-danger ms-3"><?php echo $errors['visible'] ?? '' ?></span>
        </div>
        <label class=" me-5 pe-5" for="submit"></label>
        <input type="submit" value="Create Subject" class="btn btn-primary ms-5"></input>
    </form>

</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>