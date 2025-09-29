<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Admin Panel</h1>
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/add_product.php'">New product</button>
    &emsp;
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/show_users.php'">Show users</button>
    &emsp;
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/create_admin.php'">Create admin account</button>
    &emsp;
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/profile.php'">Profile</button>
    &emsp;
    <button style="width: 150px; height: 50px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php'">Logout</button><br><br>
</body>

<?php
require_once 'connection.php';
include 'database.php';
include 'show_products.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['role'] != 'admin') {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php");
    exit();
}

show_products();

?>

</html>