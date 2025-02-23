<?php

use Constants\Routes;

$cssFiles = [
    'landing.css',
    'gallery.css'
];
$jsFiles = [
    'gallery.js'
];
?>

<?php require_once __DIR__ . '/../../include/head.include.php'; ?>
<?php require_once __DIR__ . '/../../include/header.include.php'; ?>

<main class="container text-center">
    <h1>uestas ls</h1>
    <div class="container mt-4">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card product-card h-100">
                        <img src="<?= htmlspecialchars($product->getImage()) ?>"
                            class="card-img-top"
                            alt="Imagen de <?= htmlspecialchars($product->getName()) ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?= $product->getName() ?></h3>
                            <p class="card-text description"><?= $product->getDescription() ?></p>
                            <p class="card-text price"><?= number_format($product->getPriceInCents() / 100, 2) ?>€</p>
                            <a href="/product?id=<?= $product->getId() ?>" class="btn btn-primary grow"
                                data-id="<?= $product->getId() ?>"
                                data-name="<?= $product->getName() ?>"
                                data-price="<?= $product->getPriceInCents() / 100 ?>">
                                Ver producto
                            </a>
                            <button class="btn btn-primary grow add-to-cart"
                                data-id="<?= $product->getId() ?>"
                                data-name="<?= $product->getName() ?>"
                                data-price="<?= $product->getPriceInCents() / 100 ?>">
                                Añadir al Carrito
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../../include/footer.include.php'; ?>
<?php require_once __DIR__ . '/../../include/scripts.include.php'; ?>