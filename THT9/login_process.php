<?php
session_start();

function sanitizeInput($input) 
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}
$registeredUserData = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) 
    {
        $username = sanitizeInput($_POST['username']);
        $password = sanitizeInput($_POST['password']);

        if (isset($registeredUserData['username']) && isset($registeredUserData['password'])) 
        {
            if ($username === $registeredUserData['username'] && password_verify($password, $registeredUserData['password'])) 
            {
                $_SESSION['user_data'] = 
                [
                    'username' => $username,
                ];
                header("Location: homepage.html");
                exit();
            }
        }
        $_SESSION['login_error'] = 'Username atau password salah.';
        header("Location: login.html");
        exit();
    } 
    else 
    {
        $_SESSION['login_error'] = 'Mohon masukkan username dan password.';
        header("Location: login.html");
        exit();
    }
}
else 
{
    header("Location: login.html");
    exit();
}
?>
