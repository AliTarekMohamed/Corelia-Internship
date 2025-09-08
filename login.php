<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <Label>Username&nbsp;</Label>
        <input type="text" name="username" required><br><br>

        <Label>Password&ensp;</Label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Submit</button>
        &nbsp;
        <a href="http://localhost/Corelia/Corelia-Internship/register.php">Don't have an account. Sign up</a><br><br>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-Internship/profile.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $result = is_user_exist($conn, $username, $password);

    if ($result === 0) {
        echo "Invalid Username or Password";
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: http://localhost/Corelia/Corelia-Internship/profile.php");
    }
}


?>

</html>