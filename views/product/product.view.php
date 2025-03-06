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

<main class="container text-center">
    <section class="row justify-content-center align-items-start mt-5 product-container">
        <div class="col-md-5 text-end">
            <img src="<?= htmlspecialchars($product->getImage()) ?>"
                 class="img-fluid product-image"
                 alt="Imagen de <?= htmlspecialchars($product->getName()) ?>">
        </div>

        <div class="col-md-7 text-start product-info">
            <h1 class="mt-0" data-name="<?= $product->getName(); ?>">
                <?= htmlspecialchars($product->getName()) ?>
            </h1>
            <p class="text-muted"><?= nl2br(htmlspecialchars($product->getDescription())) ?></p>

            <h3 class="product-price" data-price="<?= $product->printPrice(); ?>">
                Precio: <?= $product->printPrice() ?>
            </h3>

            <button id="product-to-cart" class="btn btn-primary mt-3 grow"
                    data-id="<?= $product->getId() ?>"
                    data-url="<?= Routes::CART_ADD ?>">
                Añadir al carrito
            </button>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
