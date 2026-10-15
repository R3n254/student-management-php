<?php
// config.php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_school';

try {
    $conn = mysqli_connect($host, $user, $pass, $db);
} catch (mysqli_sql_exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
