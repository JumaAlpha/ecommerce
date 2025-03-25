<?php
session_start();
include('config.php');

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    header("Location: shop.php"); // Redirect if already logged in
    exit();
}

// Handle registration form submission
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username or email already exists
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username or Email already exists!";
    } else {
        // Insert new user
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            $_SESSION['username'] = $username;
            header("Location: shop.php"); // Redirect to shop after registration
            exit();
        } else {
            $error = "Registration failed, please try again!";
        }
    }
}

// Handle login form submission
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if user exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: shop.php"); // Redirect to shop after login
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <!-- Trolley Navigation Buttons -->
            <div class="trolley-buttons">
                <button id="login-btn" class="active" onclick="showLogin()">Login</button>
                <button id="register-btn" onclick="showRegister()">Register</button>
            </div>

            <!-- Trolley Sliding Container -->
            <div class="form-wrapper">
                <!-- Login Form -->
                <form action="auth.php" method="POST" class="form login-form">
                    <h2>Login</h2>
                    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                </form>

                <!-- Registration Form -->
                <form action="auth.php" method="POST" class="form register-form">
                    <h2>Register</h2>
                    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text" name="location" placeholder="Location">
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const formWrapper = document.querySelector('.form-wrapper');
        const loginBtn = document.getElementById('login-btn');
        const registerBtn = document.getElementById('register-btn');

        function showLogin() {
            formWrapper.style.transform = 'translateX(0)';
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
        }

        function showRegister() {
            formWrapper.style.transform = 'translateX(-50%)';
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
        }

        // Set default view to login form
        showLogin();
    </script>
</body>
</html>
