<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Contact - HondenShopNL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../php/head.php'; ?>

<main class="page">
    <div class="page-inner">

        <section class="hero">
            <h1>Contact</h1>
            <p>Heb je een vraag over een product, een bestelling of iets anders? Stuur ons een bericht.</p>
        </section>

        <section class="static-content">
            <h2>Contactgegevens</h2>
            <p>
                E-mail: info@hondenshopnl.nl<br>
                Bereikbaarheid: maandag t/m vrijdag, 09:00 - 17:00.
            </p>

            <h2>Contactformulier</h2>
            <form class="contact-form" action="#" method="post">
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" placeholder="Je naam">

                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" placeholder="je@mail.nl">

                <label for="onderwerp">Onderwerp</label>
                <input type="text" id="onderwerp" name="onderwerp" placeholder="Waar gaat je vraag over?">

                <label for="bericht">Bericht</label>
                <textarea id="bericht" name="bericht" rows="5" placeholder="Schrijf hier je bericht..."></textarea>

                <button type="submit" class="btn-cart">
                    Bericht versturen
                </button>
            </form>
        </section>

    </div>
</main>

<?php include '../php/foot.php'; ?>

</body>
</html>
