<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="site-header">

    <div class="top-bar">
        <div class="logo">
            <span class="logo-main">HondenShop</span>
        </div>

            <form class="search-form">
                <input type="text"placeholder="Zoek naar voer, snacks, speelgoed, bedden...">
                <button type="submit">Zoeken</button>
            </form>

        <div class="user-actions">
            <?php if (!empty($_SESSION['user_id'])): ?>
                <span style="font-size:14px;">
                    Welkom, <?= htmlspecialchars($_SESSION['user_name']); ?>
                </span>

                <a class="link-login" href="/hondenshopnl/php/logout.php">Uitloggen</a>

                <?php if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                    <a class="link-login" href="/hondenshopnl/admin/admin_products.php">Admin Paneel</a>
                <?php endif; ?>
            <?php else: ?>
                <a class="link-login" href="/hondenshopnl/pages/login.php">Inloggen</a>
                <a class="link-login" href="/hondenshopnl/pages/register.php">Registreren</a>
            <?php endif; ?>

            <a href="/hondenshopnl/pages/winkelwagen.php" class="link-cart">
                &#128722; Winkelwagen
            </a>
        </div>

    </div>

    <nav class="nav-bar">
        <ul class="nav-left">
            <li> <a href="/hondenshopnl/index.php?category=">Alle producten</a> </li>
            <li><a href="/hondenshopnl/index.php?category=voer">Hondenvoer</a></li>
            <li><a href="/hondenshopnl/index.php?category=snacks">Snacks</a></li>
            <li><a href="/hondenshopnl/index.php?category=speelgoed">Speelgoed</a></li>
            <li><a href="/hondenshopnl/index.php?category=bedden">Hondenbedden</a></li>
        </ul>

        <ul class="nav-right">
            <li><a href="nog niet">NL ▾</a></li>
            <li><a href="/hondenshopnl/pages/klantenservice.php">Klantenservice</a></li>
        </ul>
    </nav>

</header>
