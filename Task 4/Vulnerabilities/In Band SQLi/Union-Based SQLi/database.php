<?php
require_once "../connection.php";

function get_games($conn, $game)
{
    try {
        $query = "SELECT game FROM games WHERE game='$game'";
        $result = $conn->query($query)->fetchAll();
        return $result;
    } catch (PDOException $e) {
        // Don't tell him any error
    }
}
