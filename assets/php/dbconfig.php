<?php
// Create database connection
$servername = "127.0.0.1:3306";
$dbname = "overload";
$svname = "mariadb-10.4.24";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;serverVersion=$svname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $GLOBALS["pdo"] = $pdo;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}