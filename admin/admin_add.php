<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id']) || empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit;
}

require_once '../php/db.php';


$errors = [];
$name = '';
$description = '';
$price = '';
$image = '';
$category = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price       = trim($_POST['price'] ?? '');
    $image       = trim($_POST['image'] ?? '');
    $category    = trim($_POST['category'] ?? '');

    if ($name === '')        { $errors[] = "Naam is verplicht."; }
    if ($description === '') { $errors[] = "Beschrijving is verplicht."; }
    if ($price === '' || !is_numeric($price)) { $errors[] = "Prijs moet een getal zijn."; }
    if ($image === '')       { $errors[] = "Afbeelding (pad) is verplicht."; }
    if ($category === '')    { $errors[] = "Categorie is verplicht."; }

    if (empty($errors)) {
        $sql = "INSERT INTO products (name, description, price, image, category)
                VALUES (:name, :description, :price, :image, :category)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category', $category);
        $stmt->execute();

        header("Location: admin_products.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw product toevoegen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../php/header.php'; ?>

<main class="page">
    <div class="page-inner">
        <section class="hero">
            <h1>Nieuw product toevoegen</h1>
            <p>Vul de gegevens van het nieuwe product in.</p>
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

            <form method="post" class="contact-form">
                <label>Naam</label>
                <input type="text" name="name" value="<?= htmlspecialchars($name); ?>">

                <label>Beschrijving</label>
                <textarea name="description" rows="4"><?= htmlspecialchars($description); ?></textarea>

                <label>Prijs (bijv. 19.99)</label>
                <input type="text" name="price" value="<?= htmlspecialchars($price); ?>">

                <label>Afbeelding (pad binnen /fotos)</label>
                <input type="text" name="image" placeholder="bijv. voer/hond_voer1.jpg"
                       value="<?= htmlspecialchars($image); ?>">

                <label>Categorie</label>
                <select name="category">
                    <option value="">-- kies categorie --</option>
                    <option value="voer"      <?= $category === 'voer' ? 'selected' : ''; ?>>voer</option>
                    <option value="snacks"    <?= $category === 'snacks' ? 'selected' : ''; ?>>snacks</option>
                    <option value="speelgoed" <?= $category === 'speelgoed' ? 'selected' : ''; ?>>speelgoed</option>
                    <option value="bedden"    <?= $category === 'bedden' ? 'selected' : ''; ?>>bedden</option>
                </select>

                <button type="submit" class="btn-cart" style="margin-top:10px;">
                    Product opslaan
                </button>
                <a href="admin_products.php" style="margin-left:8px;">Annuleren</a>
            </form>
        </section>
    </div>
</main>

<?php include '../php/footer.php'; ?>

</body>
</html>
