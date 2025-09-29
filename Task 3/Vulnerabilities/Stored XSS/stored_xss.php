<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored XSS</title>
</head>

<body>
    <h1>Stored XSS Example</h1>
    <form action="" method="post">
        <label>Your review</label>
        <input type="text" name="review" required>
        <button type="submit" name="submit">Submit</button><br><br>
    </form>
</body>

<?php
require_once 'connection.php';
include 'database.php';

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $new_review = $_POST['review'];
    if ($new_review) {
        add_review($conn, $new_review);
        header("Location: http://localhost/Stored%20XSS/stored_xss.php");
    }
}

$reviews = get_all_reviews($conn);
foreach ($reviews as $review) {
    echo htmlspecialchars($review[0]);
    echo "<br>";
}

?>

</html>