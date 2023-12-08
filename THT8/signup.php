<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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

        .signup-container {
            width: 300px;
            padding: 20px;
            color: #ffd6ff;
            border-radius: 8px;
            text-align: center;
            background-color: #333;
            box-shadow: 0 0 10px #ffd6ff;
        }

        .signup-container a {
            color: #ffd6ff;
        }

        .signup-container h1 {
            color: #ffd6ff;
            margin-bottom: 20px;
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .signup-form button {
            border: none;
            cursor: pointer;
            color: #000000;
            padding: 10px 20px;
            border-radius: 4px;
            background-color: #ffd6ff;
        }

        .signup-form button:hover {
            background-color: #ffd6ff;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form class="signup-form" id="signUpForm" action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Submit</button>
        </form>
        <p>Do you have an account? <a href="login.html">Log In</a></p>
    </div>

    <div id="registeredUsers"></div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $new_user = [
                'username' => strtolower($_POST["username"]),
                'password' => $_POST["password"]
            ];

            $users = [
                ['username' => 'langit_sekar', 'password' => 'Langit1234'],
                ['username' => 'oktaviana_salsa', 'password' => 'Caca03'],
                ['username' => 'farel_evan', 'password' => 'Fevan24'],
                ['username' => 'mirza_alayda', 'password' => 'Mijah34']
            ];

            $userFound = false;

            foreach ($users as $user) {
                if ($user['username'] === $new_user['username']) {
                    $userFound = true;
                    break;
                }
            }

            if ($userFound) {
                echo '<script>alert("Username already exists!");</script>';
            } else {
                //memeriksa password sesuai ketentuan
                if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/', $new_user['password'])) {
                    $users[] = $new_user;
                    echo '<script>alert("Account created successfully!");</script>';
                } else {
                    echo '<script>alert("Password must be at least 6 characters and contain at least one uppercase letter, one lowercase letter, and one number!");</script>';
                }
            }
        } else {
            echo '<script>alert("Failed to create an account. Make sure to fill in both fields!");</script>';
        }
    }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let signUpForm = document.getElementById("signUpForm");

            signUpForm.addEventListener("submit", function (e) {
                e.preventDefault();

                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;

                const users = [
                    { username: "Langit_sekar", password: "Langit1234" },
                    { username: "Oktaviana_salsa", password: "Caca03" },
                    { username: "Farel_evan", password: "Fevan24" },
                    { username: "Mirza_alayda", password: "Mijah34" }
                ];

                const userFound = users.some(user => user.username.toLowerCase() === username.toLowerCase());

                if (userFound) {
                    alert("Account already exists!");
                } else {
                    //memeriksa password sesuai ketentuan
                    if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/.test(password)) {
                        users.push({ username, password });
                        alert("Account created successfully!");
                        displayRegisteredUsers(users);
                    } else {
                        alert("Password must be at least 6 characters and contain at least one uppercase letter, one lowercase letter, and one number!");
                    }
                }

                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
            });

            //menampilkan daftar username yang terdaftar
            function displayRegisteredUsers(users) {
                let registeredUserListing = "Registered Usernames:\n";

                users.forEach(user => {
                    registeredUserListing += `${user.username}\n`;
                });

                alert(registeredUserListing);
            }
        });
    </script>
</body>

</html>