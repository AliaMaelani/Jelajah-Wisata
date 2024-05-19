
<?php
// Include your database connection file
include 'koneksi.php';

if ($status === "success") {
    header("Location: login.php");
    exit();
}

// Retrieve form data
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if username or email already exists
$query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    $message = "Database error: " . mysqli_error($koneksi);
    $status = "error";
} else {
    if (mysqli_num_rows($result) > 0) {
        $message = "Username or email already exists. Please choose another one.";
        $status = "error";
    } else {
        // Insert user data into database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $insert = mysqli_query($koneksi, $query);

        if ($insert) {
            $message = "Registration successful!";
            $status = "success";
        } else {
            $message = "Registration failed. Please try again.";
            $status = "error";
        }
    }
}

// Close database connection
mysqli_close($koneksi);

// Redirect to login page if registration is successful
if ($status === "success") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success {
            color: #4caf50;
        }
        .error {
            color: #f44336;
        }
        .register-btn {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .register-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($status === "success"): ?>
            <h2 class="success"><?php echo $message; ?></h2>
            <p>You are now registered. You will be redirected to the login page shortly.</p>
        <?php else: ?>
            <h2 class="error"><?php echo $message; ?></h2>
            <p>Please try registering again or go back to the <a class="register-btn" href="register.php">registration page</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>
