<?php
use Constants\Routes;
use Core\Auth;
?>

<body class="d-flex flex-column align-items-center vh-100 min-vh-100">
<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-4">
    <div class="container-fluid">
        <a id="logo" class="navbar-brand" href="<?= Routes::HOME ?>">
            <img src="/assets/imgs/logo/logo.png" alt="logo" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a class="text-uppercase" href="<?= Routes::GALLERY ?>">Plantas</a>
                </li>

                <?php if (Auth::isLoggedIn()) { ?>
                    <?php require_once __DIR__ . '/partials/header/authenticated.partial.php'; ?>
                <?php } else { ?>
                    <?php require_once __DIR__ . '/partials/header/guest.partial.php'; ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
