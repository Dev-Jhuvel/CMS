<?php
function url_for($script_path)
{
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}
function u($string = "")
{
    return urlencode($string);
}
function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function hu($string = "")
{
    return h(u($string));
}

function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . "404 Not Found");
    exit();
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
    exit();
}
function redirect_to($location)
{
    header("Location:" . url_for($location));
    exit();
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function get_and_clear_session_message()
{
    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }
}

function display_session_message()
{
    $message = get_and_clear_session_message();
    if (!is_blank($message)) {
        echo '<div class="alert alert-warning my-3">';
        echo '<h5 class="text-center">' . $message . '</h5>';
        echo '</div>';
    }
}

function move_image($page_image)
{
    $file_name = $page_image['image']['name'];
    $temp_name = $page_image['image']['tmp_name'];
    $target_path = PUBLIC_PATH . '/images/uploaded_image/' . $file_name;
    move_uploaded_file($temp_name, $target_path);
    return $file_name;
}
