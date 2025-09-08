<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <h1>Update</h1>
    <form action="" method="post">
        <Label>Username</Label>
        <input type="text" name="username" required>
        <button type="submit">Update</button>
    </form>
    <br>
    <form action="" method="post">
        <Label>E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</Label>
        <input type="text" name="email" required>
        <button type="submit">Update</button>
    </form>
    <br>
    <form action="" method="post">
        <Label>Old Password&emsp;&emsp;&emsp;&emsp;</Label>
        <input type="password" name="old_password" required>
        <br><br>
        <Label>New Password &emsp;&emsp;&emsp;&nbsp;</Label>
        <input type="password" name="new_password" required>
        <br><br>
        <Label>Confirm New Password</Label>
        <input type="password" name="confirm_new_password" required>
        <button type="submit">Update</button>
    </form>
    <br>
    <button onclick="location.href='http://localhost/Corelia/Corelia-Internship/profile.php'">Back</button><br><br>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-Internship/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'])) {
        $old_username = $_SESSION['username'];
        $new_username = $_POST['username'];

        $password = $_SESSION['password'];
        $user_id = get_user_id($conn, $old_username, $password);

        update_username($conn, $user_id, $new_username);
        $_SESSION['username'] = $new_username;
        echo "Username updated successfully";
    }

    if (isset($_POST['email'])) {
        $new_email = $_POST['email'];

        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $user_id = get_user_id($conn, $username, $password);

        update_email($conn, $user_id, $new_email);
        echo "E-mail updated successfully";
    }

    if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        $username = $_SESSION['username'];
        $current_password = $_SESSION['password'];
        $user_id = get_user_id($conn, $username, $current_password);

        if ($old_password !== $current_password) {
            echo "Old password is incorrect";
        } elseif ($new_password != $confirm_new_password) {
            echo "Passwords does not match";
        } else {
            update_password($conn, $user_id, $new_password);
            $_SESSION['password'] = $new_password;
            echo "Password updated successfully";
        }
    }
}

?>

</html>