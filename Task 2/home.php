<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <h1>Home Page</h1>
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/profile.php'">Profile</button>
    &emsp;
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php'">Logout</button><br><br>
</body>
<?php
require_once 'connection.php';
include 'database.php';
include 'show_products.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/login.php");
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php");
    exit();
}

show_products();

?>

</html>