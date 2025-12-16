<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../php/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errors[] = "Vul je e-mailadres en wachtwoord in.";
    } else {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $errors[] = "Geen gebruiker gevonden met dit e-mailadres.";
        } else {
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['is_admin']  = ($user['is_admin'] == 1);

                if ($_SESSION['is_admin']) {
                    header("Location: ../admin/admin_products.php");
                } else {
                    header("Location: ../index.php");
                }
                exit;
            } else {
                $errors[] = "Wachtwoord klopt niet.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - HondenShopNL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../php/head.php'; ?>

<main class="page">
    <div class="page-inner">
        <section class="hero">
            <h1>Inloggen</h1>
            <p>Log in met je account.</p>
        </section>

        <section class="static-content">
            <?php if (!empty($errors)): ?>
                <div style="background:#ffe0e0; padding:8px 10px; margin-bottom:10px;">
                    <ul>
                        <?php foreach ($errors as $e): ?>
                            <li><?= htmlspecialchars($e); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" class="contact-form" style="max-width: 320px;">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email">

                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password">

                <button type="submit" class="btn-cart" style="margin-top:10px;">
                    Inloggen
                </button>
            </form>
        </section>
    </div>
</main>

<?php include '../php/foot.php'; ?>

</body>
</html>
