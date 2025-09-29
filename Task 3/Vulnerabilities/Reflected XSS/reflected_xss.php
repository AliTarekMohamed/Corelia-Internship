<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflected XSS</title>
</head>

<body>
    <h1>Reflected XSS Example</h1><br>
    <form action="" method="get">
        <label>Search for something</label><br>
        <input type="text" name="search">
        <button type="submit" name="submit">Search</button><br><br>
    </form>
</body>

<?php

if (isset($_GET['submit']) && $_SERVER['REQUEST_METHOD'] == "GET") {
    $search_term = $_GET['search'];
    if ($search_term) {
        echo "<h2>Results for " . $search_term . "</h2>";
    }
}

?>

</html>