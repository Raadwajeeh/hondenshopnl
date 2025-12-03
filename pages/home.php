<?php
require_once 'php/db.php';

if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = $_GET['category'];

    $sql = "SELECT * FROM products WHERE category = :category ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category', $category);
    $stmt->execute();
} else {
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
$producten = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>HondenShopNL - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'php/header.php'; ?>

<main class="page">
    <div class="page-inner">

        <section class="hero">
            <h1>HondenShopNL</h1>
            <p>Alles voor jouw hond: voer, snacks, speelgoed en fijne bedden op één plek.</p>
        </section>

        <section class="product-list">
            <?php foreach ($producten as $p): ?>
                <article class="product-card">
                    <div class="product-image">
                        <img src="fotos/<?= htmlspecialchars($p['image']); ?>"
                             alt="<?= htmlspecialchars($p['name']); ?>">
                    </div>
                    <div class="product-info">
                        <h2><?= htmlspecialchars($p['name']); ?></h2>
                        <p><?= htmlspecialchars($p['description']); ?></p>

                        <div class="product-bottom">
                            <span class="product-price">
                                €<?= number_format($p['price'], 2, ',', '.'); ?>
                            </span>

                            <button class="btn-cart" type="button">
                                &#128722; In winkelwagen
                            </button>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php include 'php/footer.php'; ?>

</body>
</html>
