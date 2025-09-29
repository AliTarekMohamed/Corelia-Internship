<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error-Based SQLi</title>
</head>

<body>
    <h1>Error-Based SQL Injection Lab</h1>
    <form action="" method="post">
        <p>Search with games</p>
        <input type="text" name="game" required><br><br>
        <button type="submit" name="submit">Submit</button><br><br>
    </form>
</body>
<?php
require_once '../connection.php';
include 'database.php';

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['game'];
    $games = get_games($conn, $search);

    if ($games) {
        foreach ($games as $game) {
            echo $game[0] . "<br><br>";
        }
    } else {
        echo "Game not found<br><br>";
    }
}

?>

</html>