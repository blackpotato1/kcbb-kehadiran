<?php

$host = 'localhost';
$dbname = 'kcbb_kehadiran';
$dbusername = 'root';
$dbpassword = '';

try {
    // Connect to database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("error " . $e->getMessage());
}
