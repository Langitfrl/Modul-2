<?php
session_start();

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

if (
    isset($_POST['first_name'], $_POST['username'], $_POST['dob'], $_POST['email'], $_POST['password'], $_POST['password_confirm']) &&
    !empty($_POST['first_name']) &&
    !empty($_POST['username']) &&
    !empty($_POST['dob']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    !empty($_POST['password_confirm'])
) {
    if ($_POST['password'] !== $_POST['password_confirm']) {
        $_SESSION['registration_error'] = 'Password confirmation does not match.';
        header("Location: registration.html");
        exit();
    }

    $first_name = sanitizeInput($_POST['first_name']);
    $last_name = isset($_POST['last_name']) ? sanitizeInput($_POST['last_name']) : "";
    $username = sanitizeInput($_POST['username']);
    $dob = sanitizeInput($_POST['dob']);
    $email = sanitizeInput($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 

    $_SESSION['user_data'] = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'username' => $username,
        'dob' => $dob,
        'email' => $email,
        'password' => $password
    );

    $_SESSION['registration_success'] = true;

    session_regenerate_id(true);

    header("Location: login.html");
    exit();
} else {
    $_SESSION['registration_error'] = 'Please fill in all the required fields.';
    header("Location: registration.html");
    exit();
}
?>
