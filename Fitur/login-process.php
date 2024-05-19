<?php
// Include your database connection file
include 'koneksi.php';

// Retrieve form data
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Query to check if username and password match
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo "Error: " . mysqli_error($koneksi);
} else {
    if (mysqli_num_rows($result) > 0) {
        // Login successful
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard or any other page after successful login
        exit();
    } else {
        // Login failed
        header("Location: login.php?login=failed"); // Redirect back to login page with error message
        exit();
    }
}

// Close database connection
mysqli_close($koneksi);
?>
