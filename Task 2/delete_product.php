<?php
require_once 'connection.php';
include 'database.php';
session_start();

$product_id = $_POST['product_id'];
$image = "images/" . get_product($conn, $product_id)[1];
unlink("$image");
delete_product($conn, $product_id);

header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php");
