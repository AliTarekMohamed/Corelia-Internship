<?php
require_once "../connection.php";

function get_games($conn, $game)
{
    try {
        $query = "SELECT game FROM games WHERE game='$game'";
        $result = $conn->query($query)->fetchAll();
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br><br>";
        echo "Query: $query<br><br>";
    }
}
