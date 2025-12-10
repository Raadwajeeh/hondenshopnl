<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="site-header">

    <div class="top-bar">
        <div class="logo">
            <span class="logo-main">HondenShop</span>
            <span class="logo-sub">NL</span><a href="index.php"></a>
        </div>

        <form class="search-form" action="#nog niet" method="get">
            <input type="text" name="q" placeholder="Zoek naar voer, snacks, speelgoed, bedden...">
            <button type="submit">Zoeken</button>
        </form>

        <div class="user-actions">
            <a href="nog niet" class="link-login">Inloggen</a>
            <a href="winkelwagen.php" class="link-cart">
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
            <li><a href="/hondenshopnl/klantenservice.php">Klantenservice</a></li>
        </ul>
    </nav>

</header>
