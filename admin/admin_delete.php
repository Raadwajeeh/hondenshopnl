<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id']) || empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit;
}

require_once '../php/db.php';


if (!isset($_GET['id'])) {
    header("Location: admin_products.php");
    exit;
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header("Location: admin_products.php");
exit;
?>
