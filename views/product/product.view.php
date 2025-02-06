<?php
/**
 * @var Product $product
 */

use Models\Product;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-wrap justify-content-center">
    <section class="d-flex flex-column align-items-center text-center w-100">
        <h1><?= htmlspecialchars($product->getName()) ?></h1>
    </section>

    <section class="d-flex flex-wrap justify-content-evenly align-items-start mt-4 w-75">
        <div class="product-image w-50 text-center">
            <img src="<?= htmlspecialchars($product->getImage()) ?>"
                 class="w-100 b-1"
                 alt="Imagen de <?= htmlspecialchars($product->getName()) ?>">
        </div>

        <div class="product-info w-50">
            <h2>Descripción</h2>
            <p class="text-muted"><?= nl2br(htmlspecialchars($product->getDescription())) ?></p>

            <h3>Precio: <?= $product->printPrice() ?></h3>
            <a href="#" class="btn btn-primary mt-3 grow">Agregar al Carrito</a>
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