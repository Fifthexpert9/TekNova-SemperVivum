<?php
use Constants\Routes;
use Core\Auth;
?>

<body class="d-flex flex-column align-items-center vh-100 min-vh-100">
<header class="d-flex flex-wrap justify-content-between position-fixed align-items-center top-0">
    <a id="logo" href="<?= Routes::HOME ?>">
        <img src="/assets/imgs/logo/logo.png" alt="logo">
    </a>
    <nav>
        <a href="<?= Routes::GALLERY ?>" class="text-uppercase grow">Plantas</a>
        <a href="#" class="text-uppercase grow">Flores</a>
        <a href="#" class="text-uppercase grow">Accesorios</a>
        <a href="#" class="text-uppercase grow">Mistery Plantbox</a>

        <?php if (Auth::isLoggedIn()) { ?>
            <?php require_once __DIR__ . '/partials/header/authenticated.partial.php'; ?>
        <?php } else { ?>
            <?php require_once __DIR__ . '/partials/header/guest.partial.php'; ?>
        <?php } ?>
    </nav>
</header>