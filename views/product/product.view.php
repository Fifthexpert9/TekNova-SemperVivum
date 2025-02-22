<?php

/**
 * @var Product $product
 */

use Models\Product;
use Constants\Routes;



$cssFiles = [
    'landing.css'
];

$jsFiles = [
    'product.js'
];

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>


<main class="d-flex flex-wrap justify-content-center">
    <section class="d-flex flex-column align-items-center text-center w-100 product-container">
        <h1 data-name="<?= $product->getName(); ?>"><?= htmlspecialchars($product->getName()) ?></h1>
    </section>

    <section class="d-flex flex-wrap justify-content-evenly align-items-start mt-4 w-75 ">
        <div class="product-image w-50 text-center">
            <img src="<?= htmlspecialchars($product->getImage()) ?>"
                class="w-100 b-1"
                alt="Imagen de <?= htmlspecialchars($product->getName()) ?>">
        </div>

        <div class="product-info w-50">
            <h2>Descripción</h2>
            <p class="text-muted"><?= nl2br(htmlspecialchars($product->getDescription())) ?></p>
            <p class="text-muted">ID: #<?= $product->getId() ?></p>

            <h3 data-price="<?= $product->printPrice(); ?>">Precio: <?= $product->printPrice() ?></h3>
            <button id="product-to-cart" class="btn btn-primary mt-3 grow" data-id="<?= $product->getId() ?>" data-url="<?= Routes::CART_ADD ?>">Añadir al carrito</button>
        </div>
    </section>

    <section class="d-flex flex-column align-items-center text-center w-100 mt-5">
        <h2>Productos Relacionados</h2>
        <div class="d-flex flex-wrap justify-content-evenly mt-3 w-75">
            <!-- TODO: render related products -->
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
