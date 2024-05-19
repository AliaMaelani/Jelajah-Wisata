<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Check if logout button is clicked
if (isset($_GET['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to login page with success message
    header("Location: login.php?logout=success");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    background-image: url('../Gambar/bg.jpg');
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 400px; /* Lebarkan container */
    background-color: rgba(255, 255, 255, 0.7);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

.logout-btn, .home-link {
    display: inline-block;
    background-color: #ff6b00; /* Ubah warna tombol */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.logout-btn:hover, .home-link:hover {
    background-color: #e65c00; /* Warna hover */
}

.notification {
    background-color: #ff6b00; /* Warna notifikasi */
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <!-- Add your dashboard content here -->
        
        <!-- Logout button -->
        <a href="dashboard.php?logout" class="logout-btn">Logout</a>

        <!-- Back to homepage link -->
        <a href="index.html" class="home-link">Jelajah Wisata</a>

        <!-- PHP Notification -->
        <?php
        if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
            echo "<p class='notification'>Logout successful!</p>";
        }
        ?>
    </div>
</body>
</html>
