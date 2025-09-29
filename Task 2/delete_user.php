<?php
require_once 'connection.php';
include 'database.php';
session_start();

$user_id = $_POST['user_id'];
delete_user($conn, $user_id);

header("Location: http://localhost/Corelia/Corelia-sweedy-internship/Ali Tarek Mohamed/show_users.php");
