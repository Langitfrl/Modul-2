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
        <form class="signup-form" id="signUpForm" action="{{ route('akun.store') }}" method="post">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Submit</button>
        </form>
        <p>Do you have an account? <a href="{{ route('akun.index') }}">Log In</a></p>
    </div>

    <div id="registeredUsers"></div>

    <!-- Tampilkan data pengguna -->
    <ul>
        @foreach($users as $user)
        <li>
            {{ $user['username'] }} -
            <form method="post" action="{{ route('akun.destroy', $user['username']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" name="action" value="delete">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let signUpForm = document.getElementById("signUpForm");

            signUpForm.addEventListener("submit", function (e) {
                e.preventDefault();

                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;

                const users = @json($users);

                const userFound = users.some(user => user.username.toLowerCase() === username.toLowerCase());

                if (userFound) {
                    alert("Account already exists!");
                } else {
                    // Pengecekan password sesuai ketentuan
                    if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/.test(password)) {
                        users.push({
                            username,
                            password
                        });
                        alert("Account created successfully!");
                        displayRegisteredUsers(users);
                    } else {
                        alert("Password must be at least 6 characters and contain at least one uppercase letter, one lowercase letter, and one number!");
                    }
                }

                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
            });

            // Menampilkan daftar username yang terdaftar
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
