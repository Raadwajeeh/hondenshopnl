<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../php/db.php';

$errors = [];
$name = '';
$email = '';
$password = '';
$password2 = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name      = trim($_POST['name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $password  = $_POST['password']  ?? '';
    $password2 = $_POST['password2'] ?? '';

    if ($name === '') {
        $errors[] = "Naam is verplicht.";
    }

    if ($email === '') {
        $errors[] = "E-mailadres is verplicht.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "E-mailadres is ongeldig.";
    }

    if ($password === '') {
        $errors[] = "Wachtwoord is verplicht.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Wachtwoord moet minstens 6 tekens zijn.";
    }

    if ($password2 === '') {
        $errors[] = "Herhaal je wachtwoord.";
    } elseif ($password !== $password2) {
        $errors[] = "Wachtwoorden komen niet overeen.";
    }

    if (empty($errors)) {
        $check = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $check->bindParam(':email', $email);
        $check->execute();

        if ($check->fetch()) {
            $errors[] = "Er bestaat al een account met dit e-mailadres.";
        }
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password_hash)
                VALUES (:name, :email, :password_hash)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $hash);
        $stmt->execute();

        $newUserId = $conn->lastInsertId();
        $_SESSION['user_id']   = $newUserId;
        $_SESSION['user_name'] = $name;

        header("Location: ../index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren - HondenShopNL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../php/head.php'; ?>

<main class="page">
    <div class="page-inner">
        <section class="hero">
            <h1>Registreren</h1>
            <p>Maak een account aan om makkelijker te bestellen.</p>
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

            <form method="post" class="contact-form" style="max-width: 360px;">

                <label for="name">Naam</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= htmlspecialchars($name); ?>"
                    placeholder="Bijv. Sara Noor"
                >

                <label for="email">E-mailadres</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($email); ?>"
                    placeholder="bijv. sara@example.com"
                >

                <label for="password">Wachtwoord</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minstens 6 tekens"
                >

                <label for="password2">Herhaal wachtwoord</label>
                <input
                    type="password"
                    id="password2"
                    name="password2"
                >

                <button type="submit" class="btn-cart" style="margin-top:10px;">
                    Account aanmaken
                </button>

            </form>
        </section>
    </div>
</main>

<?php include '../php/foot.php'; ?>

</body>
</html>
