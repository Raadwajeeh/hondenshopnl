<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['is_admin'], $_SESSION['cart']);

    header("Location: ../index.php");
    exit;
?>