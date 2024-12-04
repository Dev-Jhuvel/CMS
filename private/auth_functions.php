<?php
function login_admin($admin)
{
    session_regenerate_id(); // prevent session fixation
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
}
function log_out_admin()
{
    unset($_SESSION['username']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['last_login']);
    return true;
}

function is_logged_in()
{
    return isset($_SESSION['admin_id']);
}

function require_login()
{
    if (!is_logged_in()) {
        $_SESSION['message'] = 'Login is Required.';
        redirect_to('/staff/login.php');
    } else {
    }
}
