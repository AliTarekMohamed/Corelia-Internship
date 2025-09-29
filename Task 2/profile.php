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

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/login.php");
    exit();
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];

$info = get_user_info($conn, $username, $password);
$fname = $info[0];
$lname = $info[1];
$email = $info[2];

echo "First name : <b>$fname</b> <br><br>";
echo "Last name : <b>$lname</b> <br><br>";
echo "Username : <b>$username</b> <br><br>";
echo "E-mail : <b>$email</b> <br><br>";

if ($role == 'admin') {
    echo "<button style=\"width: 240px; height: 35px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php'\">← Back</button><br><br>";
} else if ($role == 'user') {
    echo "<button style=\"width: 240px; height: 35px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/home.php'\">← Back</button><br><br>";
}
echo "<button style=\"width: 240px; height: 35px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/update_user.php'\">Update</button><br><br>";
echo "<button style=\"width: 240px; height: 35px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php'\">Logout</button><br><br>";


?>

</html>