<?php
######################
#     PDO Method     #
######################
$db_host = 'localhost';
$db_name = 'vuln';
$db_user = 'root';
$db_pass = '';

# Data Source Name
$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    # PHP Data Object
    $conn = new PDO($dsn, $db_user, $db_pass);
} catch (PDOException $e) {
    echo "Failed to connect : " . $e->getMessage();
}
