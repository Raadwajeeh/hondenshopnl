<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'php/db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['aantal']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'id'     => $product['id'],
                'name'   => $product['name'],
                'price'  => $product['price'],
                'image'  => $product['image'],
                'aantal' => 1
            ];
        }
    }

    header("Location: winkelwagen.php");
    exit;
}

if (isset($_POST['update'])) {
    if (isset($_POST['qty']) && is_array($_POST['qty'])) {
        foreach ($_POST['qty'] as $id => $aantal) {
            $id = intval($id);
            $aantal = max(1, intval($aantal));
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['aantal'] = $aantal;
            }
        }
    }
    header("Location: winkelwagen.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $remove_id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header("Location: winkelwagen.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    $_SESSION['cart'] = [];
    header("Location: winkelwagen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen - HondenShopNL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

<?php include 'php/header.php'; ?>

<main class="page">
    <div class="page-inner">

        <section class="hero">
            <h1>Winkelwagen</h1>
            <p>Bekijk je geselecteerde producten en pas de aantallen aan.</p>
        </section>

        <?php if (empty($_SESSION['cart'])): ?>

            <p class="cart-empty">
                Je winkelwagen is leeg. Ga terug naar de <a href="index.php">shop</a> om producten toe te voegen.
            </p>

        <?php else: ?>

            <section class="cart-section">
                <form method="post">
                    <ul class="cart-list">

                        <?php
                        $totaal = 0;
                        foreach ($_SESSION['cart'] as $item):
                            $item_total = $item['price'] * $item['aantal'];
                            $totaal += $item_total;
                        ?>
                            <li class="cart-item">
                                <div class="cart-item-left">
                                    <img
                                        src="fotos/<?= htmlspecialchars($item['image']); ?>"
                                        alt="<?= htmlspecialchars($item['name']); ?>"
                                        class="cart-item-image"
                                    >
                                </div>

                                <div class="cart-item-middle">
                                    <h3 class="cart-item-name"><?= htmlspecialchars($item['name']); ?></h3>
                                    <p class="cart-item-price">
                                        Prijs per stuk: €<?= number_format($item['price'], 2, ',', '.'); ?>
                                    </p>
                                </div>

                                <div class="cart-item-right">
                                    <label for="qty-<?= $item['id']; ?>">Aantal</label>
                                    <input
                                        type="number"
                                        id="qty-<?= $item['id']; ?>"
                                        name="qty[<?= $item['id']; ?>]"
                                        value="<?= $item['aantal']; ?>"
                                        min="1"
                                    >

                                    <p class="cart-item-total">
                                        Totaal: €<?= number_format($item_total, 2, ',', '.'); ?>
                                    </p>

                                    <a
                                        class="cart-remove"
                                        href="winkelwagen.php?action=remove&id=<?= $item['id']; ?>"
                                    >
                                        Verwijderen
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>

                    </ul>

                    <div class="cart-summary">
                        <p class="cart-summary-total">
                            Totaal bedrag: <strong>€<?= number_format($totaal, 2, ',', '.'); ?></strong>
                        </p>

                        <div class="cart-summary-actions">
                            <button type="submit" name="update" class="btn-cart cart-update">
                                Aantallen bijwerken
                            </button>

                            <a href="winkelwagen.php?action=clear" class="btn-cart cart-clear">
                                Winkelwagen leegmaken
                            </a>
                        </div>
                    </div>
                </form>
            </section>

        <?php endif; ?>

    </div>
</main>

<?php include 'php/footer.php'; ?>

</body>
</html>
