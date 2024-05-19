<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Jelajah Wisata</title>
    <style>
     body {
    font-family: Georgia, 'Times New Roman', Times, serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 400px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #ff6b00; /* Ubah warna latar belakang */
    border-color: #ff6b00; /* Ubah warna border */
    color: white;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #e65c00; /* Warna hover */
}

    </style>
</head>

<body>
    <div class="container">
        <h2>Daftar Akun Jelajah Wisata</h2>
        <form action="register-process.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Register">
        </form>
        </form>
    <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Masuk disini</a></p>
    </div>
</body>

</html>
