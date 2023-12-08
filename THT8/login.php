<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <style>
        body {
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #ffd6ff;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            color: #ffd6ff;
            border-radius: 8px;
            text-align: center;
            background-color: #333;
            box-shadow: 0 0 10px #ffd6ff;
        }

        .login-container a {
            color: #ffd6ff;
        }

        .login-container h1 {
            color: #ffd6ff;
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .login-form button {
            border: none;
            cursor: pointer;
            color: #000000;
            padding: 10px 20px;
            border-radius: 4px;
            background-color: #ffd6ff;
        }

        .login-form button:hover {
            background-color: #ffd6ff;
        }
    </style>
</head>

<body>
<div class="login-container">
    <h1>Log In</h1>
    <form class="login-form" id="loginForm" action="#" method="post"> 
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Submit</button>
    </form>
    <p>Don't you have an account?</p><a href="signup.html">Sign Up</a> 
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            echo '<script>alert("Ensure you input a value in both fields!");</script>';
        } else {
            if ($username === "Langit_sekar" && $password === "1234") {
                echo '<script>alert("Login successful!");</script>';
            } else {
                echo '<script>alert("Incorrect username or password");</script>';
            }
        }
    }
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let loginForm = document.getElementById("loginForm"); 
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();

            let username = document.getElementById("username").value;
            let password = document.getElementById("password").value;

            if (username === "" || password === "") {
                alert("Ensure you input a value in both fields!");
            } 
            else {
                if (username === "Langit_sekar" && password === "1234") {
                    alert("Login successful!");
                } 
                else {
                    alert("Incorrect username or password");
                }

                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
            }
        });
    });
</script>

</body>
</html>
