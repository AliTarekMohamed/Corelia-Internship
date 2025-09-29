<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Edit product</h1>
    <form action="" method="post">
        <Label>Name</Label>
        <input type="text" name="name" required>
        <button name="update_name" type="submit">Update</button>
    </form>
    <br>
    <form action="" method="post">
        <Label>Price&nbsp;</Label>
        <input type="number" name="price" required>
        <button name="update_price" type="submit">Update</button>
    </form>
    <br>
    <form action="" method="post">
        <Label>Stock</Label>
        <input type="number" name="stock" required>
        <button name="update_stock" type="submit">Update</button>
    </form>
    <br>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['role'] != 'admin') {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php");
    exit();
}

if (isset($_POST['product_id'])) {
    $_SESSION['product_id'] = $_POST['product_id'];
}

$product_id = $_SESSION['product_id'];
$product = get_product($conn, $product_id);
$product_image = $product[1];
$product_name = $product[2];
$product_price = $product[3];
$product_stock = $product[4];

echo "<div><div style=\"display: inline-block\"><img src=\"images/$product_image\"><br></div>&emsp;";
echo "<div style=\"display: inline-block\">$product_name<br>";
echo "Price: $product_price $<br>";
echo "In stock: $product_stock<br><br><br><br><br></div></div><br>";

if (isset($_POST['update_name']) || isset($_POST['update_price']) || isset($_POST['update_stock'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['name'])) {
            $new_product_name = $_POST['name'];
            update_product_name($conn, $product_id, $new_product_name);
            header("Refresh:0");
        }
        if (isset($_POST['price'])) {
            $new_product_price = $_POST['price'];
            update_product_price($conn, $product_id, $new_product_price);
            header("Refresh:0");
        }
        if (isset($_POST['stock'])) {
            $new_product_stock = $_POST['stock'];
            update_product_stock($conn, $product_id, $new_product_stock);
            header("Refresh:0");
        }
    }
}

// unset($_SESSION['product_id']);
echo "<button style=\"width: 70px; height: 25px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php'\">← Back</button>";

?>

</html>