<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "hondenshopnl";

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $m) {
    echo "Verbinding mislukt: " . $m->getMessage();
    exit();
}
