<?php
session_start(); // Start the session

// Include the database connection
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location.href='login.php';</script>";
        exit();
    }

    // Query the database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connect, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['userEmail'] = $row['email'];
                $_SESSION['username'] = $row['username'] ?? 'User';
                mysqli_close($connect); // Close the connection
                header('Location: index.php');
                exit();
            } else {
                echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Email not registered. Please sign up first.'); window.location.href='register.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Database query failed. Please try again later.'); window.location.href='login.php';</script>";
        exit();
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Raheem Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login-style.css">
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

    <main class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
          <h3>Raheem Pharmacy</h3>
          <p>
            Your health matters to us. Connect with us for trusted pharmacy solutions.
          </p>
          <div class="footer-links">
            <a href="#privacy">Privacy Policy</a>
            <a href="#terms">Terms of Service</a>
            <a href="#faq">FAQs</a>
          </div>
        </div>
        <div class="footer-social-media">
          <a href="https://www.facebook.com">
            <img src="fb.svg" alt="" />
          </a>
          <a href="https://twitter.com">
            <img src="twitter.svg" alt="" />
          </a>
          <a href="https://www.instagram.com">
            <img src="insta.svg" alt="" />
          </a>
          <a href="https://www.linkedin.com">
            <img src="linkedin.svg" alt="" />
          </a>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2024 Raheem Pharmacy. All rights reserved.</p>
        </div>
      </footer>
</body>
</html>
