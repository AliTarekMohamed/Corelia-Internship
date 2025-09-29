<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1>All Users</h1>
</body>
<?php
require_once 'connection.php';
include 'database.php';
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['role'] != 'admin') {
    header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/logout.php");
    exit();
}

$users = get_all_users($conn);

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Username</th>";
echo "<th>Role</th>";
echo "</tr>";
foreach ($users as $user) {
    $user_id = $user[0];
    $username = $user[1];
    $user_role = $user[2];

    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_role</td>";
    echo "<td><form action=\"delete_user.php\" method=\"post\"><input type=\"hidden\" name=\"user_id\" value=\"$user_id\"><button name=\"delete\" type=\"submit\">Delete</button></form></td>";
    echo "</tr>";
}
echo "</table><br>";
echo "<button style=\"width: 70px; height: 25px;\" onclick=\"location.href='http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/admin.php'\">← Back</button>"

?>

</html>