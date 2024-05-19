<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect to dashboard if already logged in
    exit();
}
?>

<?php
// Check if logout success notification is received
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    echo "<p class='floating-message'>Logout berhasil!</p>";
}
?>

<?php
// Include your database connection file
include 'koneksi.php';


// Retrieve form data and login logic
// Your existing login logic goes here...
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Wisata - Login</title>
    <style>
    body {
    font-family: Georgia, 'Times New Roman', Times, serif; 
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    position: relative;
}

.login-container {
    width: 400px; /* Lebarkan form */
    margin: auto; /* Posisikan di tengah */
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-container h2 {
    margin-bottom: 20px;
    text-align: center;
}

.login-container form label {
    display: block;
    margin-bottom: 8px;
}

.login-container form input[type="text"],
.login-container form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-container form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #ff6b00; /* Ubah warna latar belakang */
    border: 1px solid #ff6b00; /* Ubah warna border */
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-container form input[type="submit"]:hover {
    background-color: #e65c00; /* Warna hover */
}

.error-message {
    color: red;
    margin-top: 10px;
}

.floating-message {
    position: absolute;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #5cb85c;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

    </style>
</head>

<body>
    <div class="login-container">
        <h2>Masuk ke Jelajah Wisata</h2>
        <form action="login-process.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar disini</a></p>
        <?php

        // Check if login failed notification is received
        if (isset($_GET['login']) && $_GET['login'] == 'failed') {
            echo "<p class='error-message'>Invalid username or password. Please try again.</p>";
        }
        ?>
    </div>
</body>

</html>
