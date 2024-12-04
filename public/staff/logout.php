<?php
require_once('../../private/initialize.php');

log_out_admin();
$_SESSION['message'] = 'Logout Successfully.';
redirect_to('/staff/login.php');
