<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>

<body>
    <h1>My Profile</h1>
</body>

<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-Internship/login.php");
    exit();
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$info = get_user_info($conn, $username, $password);

echo "First name : <b>$info[0]</b> <br><br>";
echo "Last name : <b>$info[1]</b> <br><br>";
echo "Username : <b>$username</b> <br><br>";
echo "E-mail : <b>$info[2]</b> <br><br>";

echo "<button onclick=\"location.href='http://localhost/Corelia/Corelia-Internship/update.php'\">Update</button>";
echo "&emsp;";
echo "<button onclick=\"location.href='http://localhost/Corelia/Corelia-Internship/logout.php'\">Logout</button>";


?>

</html>