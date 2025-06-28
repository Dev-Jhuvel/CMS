<?php require_once('../../../private/initialize.php');
require_login();
?>

<?php
$subject_set = find_all_subjects();

?>

<?php $page_title = 'Subjects'; ?>
<?php $page_theme = 'primary'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="btn btn-primary" href="<?php echo url_for('staff/subjects/new.php'); ?>">Create New Subject</a>
    </div>

    <table class="table">
      <tr class="table-hover bg-primary text-white">
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Name</th>
        <th>Pages</th>
        <th class="ps-4 ms-4"><span class="ps-3 ms-4">Action</span></th>
      </tr>

      <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <?php $page_count  = count_pages_by_subject_id($subject['id']); ?>
        <tr>
          <td><?php echo h($subject['id']); ?></td>
          <td><?php echo h($subject['position']); ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
          <td><?php echo h($subject['menu_name']); ?></td>
          <td><?php echo $page_count; ?></td>
          <td>
            <a class="btn btn-primary btn-sm" href="<?php echo h(url_for('/staff/subjects/show.php?id=' . hu($subject['id']))); ?>">View</a>
            <a class="btn btn-success btn-sm" href="<?php echo h(url_for('/staff/subjects/edit.php?id=' . hu($subject['id']))); ?>">Edit</a>
            <a class="btn btn-danger btn-sm" href="<?php echo h(url_for('/staff/subjects/delete.php?id=' . hu($subject['id']))); ?>">Delete</a>


          </td>
        </tr>
      <?php } ?>
    </table>
    <?php mysqli_free_result($subject_set); ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>