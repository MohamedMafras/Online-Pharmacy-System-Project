<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.location.href='register.php';</script>";
        exit();
    }

    // Validate password match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match'); window.location.href='register.php';</script>";
        exit();
    }

    // Validate password strength
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long'); window.location.href='register.php';</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already registered.'); window.location.href='register.php';</script>";
        exit();
    }

    // Insert the new user into the database
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Account created successfully!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error occurred while creating the account. Please try again.'); window.location.href='register.php';</script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Raheem Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register-style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="Raheem Pharmacy Logo">
            <h1>Raheem Pharmacy</h1>
        </div>
        <nav class="headbar">
            <a href="index.php">Home</a>
            <a href="services.php">Services</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <main class="register-container">
        <div class="register-box">
            <h2>Create an Account</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="register-btn">Register</button>
                <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <h3>Raheem Pharmacy</h3>
            <p>Your health matters to us. Connect with us for trusted pharmacy solutions.</p>
            <div class="footer-links">
                <a href="#privacy">Privacy Policy</a>
                <a href="#terms">Terms of Service</a>
                <a href="#faq">FAQs</a>
            </div>
        </div>
        <div class="footer-social-media">
            <a href="https://www.facebook.com"><img src="fb.svg" alt=""></a>
            <a href="https://twitter.com"><img src="twitter.svg" alt=""></a>
            <a href="https://www.instagram.com"><img src="insta.svg" alt=""></a>
            <a href="https://www.linkedin.com"><img src="linkedin.svg" alt=""></a>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Raheem Pharmacy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
