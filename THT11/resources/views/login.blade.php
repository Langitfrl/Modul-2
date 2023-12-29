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
        <form class="login-form" id="loginForm" action="{{ route('akun.index') }}" method="post">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Submit</button>
        </form>
        <p>Don't you have an account?</p><a href="{{ route('akun.create') }}">Sign Up</a>
    </div>

    @php
    function readUsersFromFile()
    {
        $file = 'users.json';

        if (file_exists($file)) {
            $usersData = file_get_contents($file);
            return json_decode($usersData, true);
        } else {
            return [];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            echo '<script>alert("Ensure you input a value in both fields!");</script>';
        } else {
            $users = readUsersFromFile();
            $userFound = false;

            foreach ($users as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    $userFound = true;
                    break;
                }
            }

            if ($userFound) {
                echo '<script>alert("Login successful!");</script>';
            } else {
                echo '<script>alert("Incorrect username or password");</script>';
            }
        }
    }
    @endphp

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let loginForm = document.getElementById("loginForm");
            loginForm.addEventListener("submit", function (e) {
                e.preventDefault();

                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;

                if (username === "" || password === "") {
                    alert("Ensure you input a value in both fields!");
                } else {
                    alert("This is a client-side validation. In a real application, check on the server.");

                    document.getElementById("username").value = "";
                    document.getElementById("password").value = "";
                }
            });
        });
    </script>

</body>

</html>
