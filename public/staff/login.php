<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';


  if (is_blank($_POST['username'])) {
    $errors['username'] = "Username cannot be blank.";
  }
  if (is_blank($_POST['password'])) {
    $errors['password'] = "Password cannot be blank.";
  }

  if (empty($errors)) {
    $admin = find_admin_by_username($username);
    if ($admin) {
      if (password_verify($password, $admin['hashed_password'])) {
        // password matches
        login_admin($admin);
        $_SESSION['message'] = 'Login Successfully.';
        redirect_to('/staff/index.php');
      } else {
        //username found, but wrong password
        $errors['login'] = "Wrong credentials.";
      }
    } else {
      // no username found
      $errors['login'] = "Wrong credentials.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>



  <form action="login.php" method="post">
    <div class="form-group">
      <input class="mb-3 p-1 rounded-3" type="text" name="username" placeholder="Username">
      <span class="text-danger ms-3"><?php echo $errors['username'] ?? '' ?></span>
    </div>
    <div class="form-group">
      <input class="mb-3 p-1 rounded-3" type="password" name="password" placeholder="Password">
      <span class="text-danger ms-3"><?php echo $errors['password'] ?? '' ?></span>
      <p class="text-danger ms-3"><?php echo $errors['login'] ?? '' ?></p>
    </div>
    <input class="btn btn-<?php echo $page_theme ?>" type="submit" name="submit" value="Submit" />
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>