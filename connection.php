<?php
// connection.php
// Database connection settings
$host = 'localhost';
$dbname = 'hospital';
$username = 'root';
$password = '';

try {
    $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
