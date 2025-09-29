<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<!-- &nbsp; -->
<!-- &ensp; -->
<!-- &emsp; -->

<body>
    <h1>Register</h1>
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

        <button style="width: 240px; height: 35px;" name="submit" type="submit">Register</button><br><br>
        &nbsp;
        <a href="http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/login.php">Already have an account. Login</a><br><br>
    </form>
</body>

<?php
/*
include -> Generate warning and the script continue execution
require -> Generates a fatal error and the script will stop
require_once -> The same as require except PHP will check if the file has already been included,
                and if so, not include (require) it again.
*/
require_once 'connection.php';
include 'database.php';
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/profile.php");
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

    add_new_user($conn, $fname, $lname, $username, $email, $password);

    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/login.php");
}

?>

</html>