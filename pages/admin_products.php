<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id']) || empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit;
}

require_once '../php/db.php';


$sql = "SELECT * FROM products ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin - Producten beheren</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../php/header.php'; ?>

<main class="page">
    <div class="page-inner">

        <section class="hero">
            <h1>Admin - Producten</h1>
            <p>Overzicht van alle producten in de webshop.</p>
        </section>

        <section class="static-content">
            <p>
                <a href="admin_add.php" class="btn-cart">Nieuw product toevoegen</a>
                <a href="../index.php" class="btn-cart" style="margin-left:8px;">Terug naar shop</a>
            </p>

            <table style="width:100%; border-collapse: collapse; margin-top: 12px; font-size:14px;">
                <tr style="background:#f0f0f0;">
                    <th style="border:1px solid #ddd; padding:6px;">ID</th>
                    <th style="border:1px solid #ddd; padding:6px;">Naam</th>
                    <th style="border:1px solid #ddd; padding:6px;">Categorie</th>
                    <th style="border:1px solid #ddd; padding:6px;">Prijs</th>
                    <th style="border:1px solid #ddd; padding:6px;">Afbeelding</th>
                    <th style="border:1px solid #ddd; padding:6px;">Acties</th>
                </tr>

                <?php foreach ($producten as $p): ?>
                    <tr>
                        <td style="border:1px solid #ddd; padding:6px;"><?= $p['id']; ?></td>
                        <td style="border:1px solid #ddd; padding:6px;"><?= htmlspecialchars($p['name']); ?></td>
                        <td style="border:1px solid #ddd; padding:6px;"><?= htmlspecialchars($p['category']); ?></td>
                        <td style="border:1px solid #ddd; padding:6px;">
                            €<?= number_format($p['price'], 2, ',', '.'); ?>
                        </td>
                        <td style="border:1px solid #ddd; padding:6px;">
                            <img src="../fotos/<?= htmlspecialchars($p['image']); ?>"
                                 alt=""
                                 style="width:60px; height:60px; object-fit:cover;">
                        </td>
                        <td style="border:1px solid #ddd; padding:6px;">
                            <a href="admin_edit.php?id=<?= $p['id']; ?>">Bewerken</a> |
                            <a href="admin_delete.php?id=<?= $p['id']; ?>"
                               onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                                Verwijderen
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </section>

    </div>
</main>

<?php include '../php/footer.php'; ?>

</body>
</html>
