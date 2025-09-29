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

        <button style="width: 240px; height: 35px;" name="login" type="submit">Login</button><br><br>
        &nbsp;
        <a href="http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/register.php">Don't have an account. Sign up</a><br><br>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/profile.php");
    exit();
}

if (isset($_POST['login'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = is_user_exist($conn, $username, $password);
            print_r($result);

            if ($result == NULL) {
                echo "Invalid Username or Password";
            } else {
                $role = $result[0];

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role;

                if ($role == 'user') {
                    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/home.php");
                    exit();
                } else if ($role == 'admin') {
                    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php");
                    exit();
                }
            }
        }
    }
}

?>

</html>