<?php include_once('../../../private/initialize.php');
require_login();
redirect_to('staff/index.php');
?>

<?php
$result_set = find_all_pages();
?>
<?php $page_title  = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="pages listing">
        <h1 class="my-4 fw-bold">Pages</h1>
        <div class="actions">
            <a class="btn btn-success" href="<?php echo url_for('/staff/pages/new.php') ?>">Create New Page</a>
        </div>

        <table class="table">
            <tr class="table-hover bg-success text-white">
                <th>ID</th>
                <th>Subject</th>
                <th>Position</th>
                <th>visible</th>
                <th>Page Name</th>
                <th class="ps-4 ms-4"><span class="ps-3 ms-4">Action</span></th>
            </tr>
            <?php while ($page = mysqli_fetch_assoc($result_set)) { ?>
                <tr>
                    <td><?php echo h($page['id']); ?></td>
                    <td><?php
                        $subject = find_subject_by_id($page['subject_id']);
                        echo h($subject['menu_name']); ?></td>
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