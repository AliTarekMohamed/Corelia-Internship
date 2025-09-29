<?php
require_once "connection.php";

function add_review($conn, $review)
{
    $query = "INSERT INTO reviews VALUES (NULL, '$review')";
    $conn->exec($query);
}

function get_all_reviews($conn)
{
    $query = "SELECT review FROM reviews";
    $result = $conn->query($query)->fetchAll();
    return $result;
}
