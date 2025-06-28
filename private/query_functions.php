<?php


// Subjects Query Functions
function validate_subject($subject)
{
    $errors = [];
    // Menu name
    if (is_blank($subject['menu_name'])) {
        $errors['menu_name'] = "*Menu name must not be blank.";
    } elseif (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors['menu_name'] = "*Menu name must be between 2 and 255 characters.";
    }
    $current_id = $subject['id'] ?? "0";
    if (!has_unique_subject_menu_name($subject['menu_name'], $current_id)) {
        $errors['menu_name'] = "*Menu name must be unique.";
    }

    //position
    $position_int = (int) $subject['position'];
    if ($position_int <= 0) {
        $errors['position'] = "*Position must be greater than 0.";
    } elseif ($position_int > 999) {
        $errors['position'] = "*Position must be less than 999.";
    }

    //visible
    $visible_string = (string) $subject['visible'];
    if (!has_inclusion_of($visible_string, ["0", "1"])) {
        $errors['visible'] = "*Visible must be true or false.";
    }

    return $errors;
}

function shift_subject_positions($start_pos, $end_pos, $current_id = 0)
{
    global $db;

    if ($start_pos == $end_pos) {
        return;
    }

    $sql = "UPDATE subjects ";
    if ($start_pos == 0) {
        // new item, +1 to items greater than $end_pos
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
    } elseif ($end_pos == 0) {
        // delete item, -1 from items greater than $start_pos
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
    } elseif ($start_pos < $end_pos) {
        // move later, -1 from items between (including $end_pos)
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
        $sql .= "AND position <= '" . db_escape($db, $end_pos) . "' ";
    } elseif ($start_pos > $end_pos) {
        // move earlier, +1 to items between (including $end_pos)
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
        $sql .= "AND position < '" . db_escape($db, $start_pos) . "' ";
    }
    // Exclude the current_id in the SQL WHERE clause
    $sql .= "AND id != '" . db_escape($db, $current_id) . "' ";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
function find_all_subjects($option = [])
{
    global $db;

    $visible = $option['visible'] ?? false;
    $sql = "SELECT * FROM subjects ";
    if ($visible) {
        $sql .= "WHERE visible = true ";
    }

    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($subject_id, $option = [])
{
    global $db;
    $visible = $option['visible'] ?? false;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $subject_id) . "'";
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($subject)
{
    global $db;

    $errors = validate_subject($subject);
    if (!empty($errors)) {
        return $errors;
    }

    shift_subject_positions(0, $subject['position']);

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES ( ";
    $sql .= "'" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "'" . db_escape($db, $subject['position']) . "', ";
    $sql .= "'" . db_escape($db, $subject['visible']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // FOR INSERT STATEMENT IT WILL RETURN TRUE/FALSE
    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function update_subject($subject)
{
    global $db;

    $errors = validate_subject($subject);
    if (!empty($errors)) {
        return $errors;
    }

    $old_subject = find_subject_by_id($subject['id']);
    $old_position = $old_subject['position'];
    shift_subject_positions($old_position, $subject['position'], $subject['id']);

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    //UPDATE STATEMENT RETURN TRUE OR FALSE
    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_subject($subject_id)
{
    global $db;

    $old_subject = find_subject_by_id($subject_id);
    $old_position = $old_subject['position'];
    shift_subject_positions($old_position, 0, $subject_id);

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $subject_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    //DELETE STATEMENT return TRUE OR FALSE
    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

// Pages Query Functions
function validate_page($page, $option = [])
{
    $errors = [];
    $image_required = $option['image_required'] ?? true;


    if (is_blank($page['menu_name'])) {
        $errors['menu_name'] = "Menu name cannot be blank.";
    } elseif (!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors['menu_name'] = "Menu name must between 2 to 255 characters";
    }

    $current_id = $page['id'] ?? '0';
    if (!has_unique_page_menu_name($page['menu_name'], $current_id)) {
        $errors['menu_name'] = "Menu name must be unique." . $current_id;
    }

    $subject_id_int = (int) $page['subject_id'];
    if ($subject_id_int <= 0) {
        $errors['subject_id'] = "Subject Id must be higher than 0.";
    } elseif ($subject_id_int > 999) {
        $errors['subject_id'] = "Subject Id must be less than 999.";
    }

    $position_int = (int) $page['position'];
    if ($position_int <= 0) {
        $errors['position'] = "Position must be higher than 0.";
    } elseif ($position_int > 999) {
        $errors['position'] = "Position must be less than 999.";
    }

    $visible_string = (string) $page['visible'];
    if (!has_inclusion_of($visible_string, ['0', '1'])) {
        $errors['visible'] = "Visible must have be true or false.";
    }

    if ($image_required) {

        $image = $page['image'];
        $file_name = $image['image']['name'];
        $extention = pathinfo($file_name, PATHINFO_EXTENSION);
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if ($file_name === '') {
            $errors['image'] = "No file Uploaded.";
        } elseif (!in_array($extention, $allowed_types)) {
            $errors['image'] = "Invalid Image type.";
        }
    }
    if (is_blank($page['content'])) {
        $errors['content'] = "Content cannot be blank.";
    }
    return $errors;
}

function shift_page_positions($start_pos, $end_pos, $subject_id, $current_id = 0)
{
    global $db;

    if ($start_pos == $end_pos) {
        return;
    }

    $sql = "UPDATE pages ";
    if ($start_pos == 0) {
        // new item, +1 to items greater than $end_pos
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
    } elseif ($end_pos == 0) {
        // delete item, -1 from items greater than $start_pos
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
    } elseif ($start_pos < $end_pos) {
        // move later, -1 from items between (including $end_pos)
        $sql .= "SET position = position - 1 ";
        $sql .= "WHERE position > '" . db_escape($db, $start_pos) . "' ";
        $sql .= "AND position <= '" . db_escape($db, $end_pos) . "' ";
    } elseif ($start_pos > $end_pos) {
        // move earlier, +1 to items between (including $end_pos)
        $sql .= "SET position = position + 1 ";
        $sql .= "WHERE position >= '" . db_escape($db, $end_pos) . "' ";
        $sql .= "AND position < '" . db_escape($db, $start_pos) . "' ";
    }
    // Exclude the current_id in the SQL WHERE clause
    $sql .= "AND id != '" . db_escape($db, $current_id) . "' ";
    $sql .= "AND subject_id = '" . db_escape($db, $subject_id) . "'";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if ($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_pages()
{
    global $db;



    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_page_by_id($page_id, $option = [])
{
    global $db;
    $visible = $option['visible'] ?? false;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $page_id) . "' ";
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function insert_page($page)
{
    global $db;
    $errors = validate_page($page);
    if (!empty($errors)) {
        return $errors;
    }

    $file_name = move_image($page['image']);

    shift_page_positions(0, $page['position'], $page['subject_id']);

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, image, content) ";
    $sql .= "VALUES ( ";
    $sql .= "'" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "'" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "'" . db_escape($db, $page['position']) . "', ";
    $sql .= "'" . db_escape($db, $page['visible']) . "', ";
    $sql .= "'" . db_escape($db, $file_name) . "',";
    $sql .= "'" . db_escape($db, $page['content']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function update_page($page)
{
    global $db;
    $image = $page['image'];
    $image_sent = ($image['image']['name'] !== ''); // if there is image it will return false
    $errors = validate_page($page, ['image_required' => $image_sent]);
    if (!empty($errors)) {
        return $errors;
    }

    $file_name = move_image($page['image']);

    $old_page = find_page_by_id($page['id']);
    $old_position = $old_page['position'];
    shift_page_positions($old_position, $page['position'], $page['subject_id'], $page['id']);

    $sql = "UPDATE pages SET ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    if ($image_sent) {
        $sql .= "image='" . db_escape($db, $file_name) . "', ";
    }
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_page($page_id)
{

    $old_page = find_page_by_id($page_id);
    $old_position = $old_page['position'];
    shift_page_positions($old_position, 0, $old_page['subject_id'], $old_page['id']);

    global $db;
    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $page_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function find_pages_by_subject_id($subject_id, $option = [])
{
    global $db;
    $visible = $option['visible'] ?? false;

    $sql = "SELECT * FROM pages ";

    $sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function count_pages_by_subject_id($subject_id, $option = [])
{
    global $db;
    $visible = $option['visible'] ?? false;

    $sql = "SELECT COUNT(*) AS count FROM pages ";

    $sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $count = $row['count'];
    return $count;
}


// Admins

function validate_admin($admin, $option = [])
{
    $errors = [];
    $password_required = $option['password_required'] ?? true;

    if (is_blank($admin['first_name'])) {
        $errors['first_name'] = "First Name cannot be blank.";
    } elseif (!has_length($admin['first_name'], ['min' => 2, 'max' => 255])) {
        $errors['first_name'] = "First Name must have between 2 to 255 characters.";
    }

    if (is_blank($admin['last_name'])) {
        $errors['last_name'] = "Last Name cannot be blank.";
    } elseif (!has_length($admin['last_name'], ['min' => 2, 'max' => 255])) {
        $errors['last_name'] = "Last Name must have between 2 to 255 characters.";
    }

    if (is_blank($admin['email'])) {
        $errors['email'] = "Email cannot be blank.";
    } elseif (!has_length($admin['last_name'], ['min' => 2, 'max' => 255])) {
        $errors['email'] = "Email must have between 2 to 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
        $errors['email'] = "Email must have valid format.";
    }

    if (is_blank($admin['username'])) {
        $errors['username'] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], ['min' => 2, 'max' => 255])) {
        $errors['username'] = "Username must have between 2 to 255 characters.";
    }

    $current_id = $admin['id'] ?? "0";
    if (!unique_username($admin['username'], $current_id)) {
        $errors['username'] = "Username must be unique.";
    }

    if ($password_required) {
        if (is_blank($admin['password'])) {
            $errors['password'] = "Password cannot be blank.";
        } elseif (!has_length($admin['password'], ['min' => 12, 'max' => 255])) {
            $errors['password'] = "Password must have between 12 to 255 characters.";
        } elseif (!has_valid_password_format($admin['password'])) {
            $errors['password'] = "Password must be at least one uppercase, one lowecase, one number and one symbol.";
        }

        if (is_blank($admin['confirm_password'])) {
            $errors['confirm_password'] = "Confirm password cannot be blank.";
        } elseif ($admin['confirm_password'] !== $admin['password']) {
            $errors['confirm_password'] = "Password do not match.";
        }
    }

    return $errors;
}
function find_all_admins()
{
    global $db;
    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY first_name ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_admin_by_id($admin_id)
{
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin_id) . "' ";
    $result = mysqli_query($db, $sql);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

function find_admin_by_username($admin_username)
{
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $admin_username) . "' ";
    $result = mysqli_query($db, $sql);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

function insert_admin($admin)
{
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
        return $errors;
    }
    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES ( ";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "'" . db_escape($db, $admin['email']) . "', ";
    $sql .= "'" . db_escape($db, $admin['username']) . "', ";
    $sql .= "'" . db_escape($db, $hashed_password) . "' ";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function update_admin($admin)
{
    global $db;

    $password_sent = !is_blank($admin['password']); // if there is password it will return false

    $errors = validate_admin($admin, ['password_required' => $password_sent]); // if it was false it dont require password
    if (!empty($errors)) {
        return $errors;
    }
    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    if ($password_sent) {
        $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo $sql;
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}
function delete_admin($admin_id)
{
    global $db;

    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin_id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    } else {
        mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function reset_admin()
{
    global $db;
    $sql = "Truncate table admins ";
    $result = mysqli_query($db, $sql);
    return $result;
}
