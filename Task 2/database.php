<?php
require_once "connection.php";

// exec ->  just inserts, updates or deletes. It only returns the number of rows affected or false.
// query ->  We got the # of rows affected by calling the PDOStatement->rowCount() method

function add_new_user($conn, $fname, $lname, $username, $email, $password, $role = 'user')
{
    $query = "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$email', '$password', '$role')";
    $conn->exec($query);
}

function is_user_exist($conn, $username, $password)
{
    $query = "SELECT role FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    if ($result->rowCount() == 1) {
        return $result->fetch();
    } else {
        return NULL;
    }
}

function get_user_id($conn, $username, $password)
{
    $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query)->fetch();
    return $result[0];
}

function get_user_info($conn, $username, $password)
{
    $query = "SELECT fname, lname, email FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query)->fetch();
    return $result;
}

function get_all_users($conn)
{
    $query = "SELECT id, username, role FROM users";
    $result = $conn->query($query)->fetchAll();
    return $result;
}

function delete_user($conn, $user_id)
{
    $query = "DELETE FROM users WHERE id = '$user_id'";
    $conn->exec($query);
}

function update_username($conn, $id, $username)
{
    $query = "UPDATE users SET username = '$username' WHERE id = $id";
    $conn->exec($query);
}

function update_email($conn, $id, $email)
{
    $query = "UPDATE users SET email = '$email' WHERE id = $id";
    $conn->exec($query);
}

function update_password($conn, $id, $password)
{
    $query = "UPDATE users SET password = '$password' WHERE id = $id";
    $conn->exec($query);
}

function add_new_product($conn, $product_image, $product_name, $product_price, $product_stock)
{
    $query = "INSERT INTO products VALUES (NULL, '$product_image', '$product_name', $product_price, $product_stock)";
    $conn->exec($query);
}

function get_product($conn, $product_id)
{
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query)->fetch();
    return $result;
}

function get_all_products($conn)
{
    $query = "SELECT * FROM products";
    $result = $conn->query($query)->fetchAll();
    return $result;
}

function update_product_name($conn, $product_id, $product_name)
{
    $query = "UPDATE products SET name = '$product_name' WHERE id = $product_id";
    $conn->exec($query);
}
function update_product_price($conn, $product_id, $product_price)
{
    $query = "UPDATE products SET price = '$product_price' WHERE id = $product_id";
    $conn->exec($query);
}
function update_product_stock($conn, $product_id, $product_stock)
{
    $query = "UPDATE products SET stock = '$product_stock' WHERE id = $product_id";
    $conn->exec($query);
}

function delete_product($conn, $product_id)
{
    $query = "DELETE FROM products WHERE id = '$product_id'";
    $conn->exec($query);
}
