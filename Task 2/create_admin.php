<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Create Admin Account</h1>
    <form action="" method="post">
        <Label>First name</Label>
        <input type="text" name="fname" required><br><br>

        <Label>Last name</Label>
        <input type="text" name="lname" required><br><br>

        <Label>Username</Label>
        <input type="text" name="username" required><br><br>

        <Label>E-mail&emsp;&nbsp;</Label>
        <input type="text" name="email" required><br><br>

        <Label>Password&nbsp;</Label>
        <input type="password" name="password" required><br><br>

        <button style="width: 240px; height: 35px;" name="submit" type="submit">Submit</button><br><br>

        <button style="width: 70px; height: 25px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php'">← Back</button>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['role'] != 'admin') {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php");
    exit();
}

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    add_new_user($conn, $fname, $lname, $username, $email, $password, 'admin');
}

?>

</html>