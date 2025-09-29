<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Add New Product</h1>
    <form action="" method="post" enctype='multipart/form-data'>
        <Label>Image</Label>
        <input type="file" name="image" required><br><br>

        <Label>Name</Label>
        <input type="text" name="name" required><br><br>

        <Label>Price&nbsp;</Label>
        <input type="number" name="price" required><br><br>

        <Label>Stock</Label>
        <input type="number" name="stock" required><br><br>

        <button style="width: 210px; height: 35px;" name="submit" type="submit">Submit</button><br><br>

    </form>
    <button style="width: 70px; height: 25px;" onclick="location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php'">← Back</button>
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
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $folder = 'images/' . $image;
        move_uploaded_file($tmp, $folder);

        add_new_product($conn, $image, $name, $price, $stock);

        echo "<br><br>New product added successfully";
    }
}

?>

</html>