<?php
$koneksi = mysqli_connect("localhost", "root", "", "spk_saw_fuzzyv2");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>

<?php
// includes/init.php

// Database connection settings
$host = 'localhost';
$dbname = 'spk_saw_fuzzyv2';
$username = 'root';
$password = '';

// Establish a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
