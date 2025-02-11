<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Raheem Pharmacy</title>
    <link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard-style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="Raheem Pharmacy Logo">
            <h1>Raheem Pharmacy</h1>
        </div>
        <nav class="headbar">
            <a href="index.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="dashboard">
        <div class="dashboard-sidebar">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-orders.php">Manage Orders</a></li>
                <li><a href="manage-products.php">Manage Products</a></li>
                <li><a href="account-settings.php">Account Settings</a></li>
            </ul>
        </div>
        <div class="dashboard-content">
            <h2>Welcome to your Dashboard, User</h2>
            <div class="overview">
                <div class="overview-box">
                    <h3>Total Orders</h3>
                    <p>120</p>
                </div>
                <div class="overview-box">
                    <h3>Total Sales</h3>
                    <p>$12,500</p>
                </div>
                <div class="overview-box">
                    <h3>Pending Deliveries</h3>
                    <p>25</p>
                </div>
            </div>
            <div class="recent-activity">
                <h3>Recent Activity</h3>
                <ul>
                    <li>Order #345 - Completed</li>
                    <li>Order #346 - Pending</li>
                    <li>Order #347 - Delivered</li>
                </ul>
            </div>
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
