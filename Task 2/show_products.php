<?php
session_start();
$products = get_all_products($conn);

function show_products()
{
    global $products;
    foreach ($products as $product) {
        echo "<div>";
        $product_id = $product[0];
        $product_image = $product[1];
        $product_name = $product[2];
        $product_price = $product[3];
        $product_stock = $product[4];
        echo "<div style=\"display: inline-block\"><img src=\"images/$product_image\" width=\"300\" hight=\"100\"><br></div>&emsp;";
        echo "<div style=\"display: inline-block\">$product_name<br>";
        echo "Price: $product_price $<br>";
        echo "In stock: $product_stock<br><br>";
        if ($_SESSION['role'] == 'admin') {
            echo "<form action=\"update_product.php\" method=\"post\" style=\"display: inline-block\"><input type=\"hidden\" name=\"product_id\" value=\"$product_id\"><button style=\"width: 60px; height: 25px;\" name=\"edit\" type=\"submit\">Edit</button></form>";
            echo "&ensp;";
            echo "<form action=\"delete_product.php\" method=\"post\" style=\"display: inline-block\"><input type=\"hidden\" name=\"product_id\" value=\"$product_id\"><button style=\"width: 60px; height: 25px;\" name=\"delete\" type=\"submit\">Delete</button></form>";
        }
        echo "<br><br><br></div></div><br>";
    }
}
