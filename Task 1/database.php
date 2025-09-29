<?php
require_once "connection.php";

// exec ->  just inserts, updates or deletes. It only returns the number of rows affected or false.
// query ->  We got the # of rows affected by calling the PDOStatement->rowCount() method

function add_new_user($conn, $fname, $lname, $username, $email, $password)
{
    $query = "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$email', '$password')";
    $conn->exec($query);
}

function is_user_exist($conn, $username, $password)
{
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $count = $conn->query($query)->rowCount();
    return $count;
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
