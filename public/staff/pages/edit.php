<?php require_once('../../../private/initialize.php');
require_login();

if (!isset($_GET['id'])) {
    redirect_to('/staff/pages/index.php');
}
$id = $_GET['id'];

if (is_post_request()) {
    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['menu_name'] = $_POST['menu_name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['image'] = $_FILES ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = update_page($page);
    if ($result === true) {
        $_SESSION['message'] = 'The page was update successfully.';

        redirect_to('/staff/pages/show.php?id=' . $id);
    } else {
        $errors = $result;
    }
} else {
    $page = find_page_by_id($id);
}
$page_count = count_pages_by_subject_id($page['subject_id']);
?>
<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/show.php?id=' . $page['subject_id']) ?>">&laquo; Back to Subject Page</a>
    <h1 class="mt-4">Edit Page</h1>
    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . hu($id)); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="fs-4 me-5" for="subject_id">Subject</label>
            <select class="ms-4 pe-3" name="subject_id">
                <?php
                $subject_set = find_all_subjects();
                while ($subject = mysqli_fetch_assoc($subject_set)) {
                    echo "<option value=\"" . h($subject['id']) . "\"";
                    if ($page['subject_id'] === $subject['id']) {
                        echo " selected";
                    }
                    echo ">" . h($subject['menu_name']) . "</option>";
                }
                mysqli_free_result($subject_set);
                ?>
            </select>
            <span class="text-danger ms-3"><?php echo $errors['subject_id'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <label class="fs-4 me-3" for="menu_name">Menu Name</label>
            <input type="text" class="w-25" name="menu_name" value="<?php echo h($page['menu_name']) ?>">
            <span class="text-danger ms-3"><?php echo $errors['menu_name'] ?? '' ?></span>
        </div>
        <div class="form-group">
            <label class="fs-4 me-5" for="position">Position</label>
            <select class="ms-3" name="position">
                <?php
                for ($i = 1; $i <= $page_count; $i++) {
                    echo "<option value=\"{$i}\"";
                    if ($i == $page['position']) {
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
            <input class="form-check-input ms-5 px-2" type="checkbox" name="visible" value="1" <?php if ($page['visible'] == "1") {
                                                                                                    echo "checked";
                                                                                                } ?>>
            <span class="text-danger ms-3"><?php echo $errors['visible'] ?? '' ?></span>
        </div>
        <div class="form-group mb-2">
            <label class="fs-4 me-4 pe-4" for="image">Image</label>
            <input type="file" class="w-25 ms-4 ps-2" name="image">
            <span class="text-danger ms-3"><?php echo $errors['image'] ?? '' ?></span>
        </div>
        <div class="form-group w-50 d-flex">
            <label class="fs-4 me-4 pe-4" for="content">Content</label>
            <textarea class="form-control border border-black ms-3 ps-4 mb-3" name="content" rows="5" cols="1"><?php echo h($page['content']) ?></textarea>
            <span class="text-danger ms-3"><?php echo $errors['content'] ?? '' ?></span>

        </div>
        <label class=" me-5 pe-5" for="submit"></label>
        <input type="submit" value="Edit Page" class="btn btn-<?php echo $page_theme ?> ms-5"></input>
    </form>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>