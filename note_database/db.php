<?php
$host = "localhost";
$db = "notes"; // default user untuk MySQL
$user = "root";     // password default, kosong jika tidak diatur
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to database: " . $e->getMessage());
}
?>
