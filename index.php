<?php
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>DogLove Shop - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="page">
    <div class="page-inner">

        <section class="hero">
            <h1>DogLove Shop</h1>
            <p>Alles voor jouw hond: voer, speelgoed en fijne bedden op één plek.</p>
        </section>

        <section class="product-list">
            <article class="product-card">
                <div class="product-image">
                    <img src="fotos/hond_voer.jpg" alt="Hondenvoer">
                </div>
                <div class="product-info">
                    <h2>Premium Hondenvoer Adult</h2>
                    <p>Volledig voer voor volwassen honden. Rijk aan kip, met vitamines voor een glanzende vacht.</p>
                    <div class="product-bottom">
                        <span class="product-price">€24,99</span>
                        <button class="btn-cart">
                            &#128722; In winkelwagen
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card">
                <div class="product-image">
                    <img src="fotos/hond_speelgoed.jpg" alt="Hondenspeelgoed">
                </div>
                <div class="product-info">
                    <h2>Sterk Touwspeelgoed</h2>
                    <p>Stevig touw voor trekspelletjes. Geschikt voor middelgrote en grote honden.</p>
                    <div class="product-bottom">
                        <span class="product-price">€9,99</span>
                        <button class="btn-cart">
                            &#128722; In winkelwagen
                        </button>
                    </div>
                </div>
            </article>

            <article class="product-card">
                <div class="product-image">
                    <img src="fotos/hond_bed.jpg" alt="Hondenbed">
                </div>
                <div class="product-info">
                    <h2>Comfort Hondenbed</h2>
                    <p>Zacht en wasbaar hondenbed. Ideaal voor een warme en rustige slaapplaats.</p>
                    <div class="product-bottom">
                        <span class="product-price">€39,99</span>
                        <button class="btn-cart">
                            &#128722; In winkelwagen
                        </button>
                    </div>
                </div>
            </article>

        </section>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
