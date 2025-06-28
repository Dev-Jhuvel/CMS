<?php
require_once('../../../private/initialize.php');
require_login();
$page_title = 'Show Subject';
if (!isset($_GET['id'])) {
    redirect_to('/staff/subjects/index.php');
}
$id = $_GET['id'] ?? '';
$subject = find_subject_by_id($id);
$result_set = find_pages_by_subject_id($id);
include(SHARED_PATH . '/staff_header.php');
?>


<div id="content">
    <a class="btn btn-secondary" href="<?php echo url_for('/staff/subjects/index.php') ?>">&laquo; Back to List</a>
    <div class="page show">
        <h1 class="my-4 fw-bold">Subject: <?php echo h($subject['menu_name']); ?></h1>
        <div class="mx-4">
            <h3>Menu Name: <?php echo h($subject['menu_name']); ?></h3>
            <h3>Position: <?php echo h($subject['position']); ?></h3>
            <h3>Visible: <?php echo $subject['visible'] === '1' ? 'true' : 'false' ?></h3>
        </div>
        <hr />
    </div>
    <div class="pages listing">
        <h2 class="my-4 fw-bold">Pages</h2>
        <div class="actions">
            <a class="btn btn-success" href="<?php echo url_for('/staff/pages/new.php?subject_id=' . hu($subject['id'])) ?>">Create New Page</a>
        </div>

        <table class="table">
            <tr class="table-hover bg-success text-white">
                <th>ID</th>
                <th>Position</th>
                <th>visible</th>
                <th>Page Name</th>
                <th class="ps-4 ms-4"><span class="ps-3 ms-4">Action</span></th>
            </tr>
            <?php while ($page = mysqli_fetch_assoc($result_set)) { ?>
                <tr>
                    <td><?php echo h($page['id']); ?></td>
                    <td><?php echo h($page['position']); ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo h($page['menu_name']); ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo url_for('/staff/pages/show.php?id=' . hu($page['id'])); ?>">View</a>
                        <a class="btn btn-success btn-sm" href="<?php echo url_for('/staff/pages/edit.php?id=' . hu($page['id'])); ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="<?php echo url_for('/staff/pages/delete.php?id=' . hu($page['id'])); ?>">Delete</a>

                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>