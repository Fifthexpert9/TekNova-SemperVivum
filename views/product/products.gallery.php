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
<?php require_once __DIR__ . '/../../include/header.include.php';?>

<main class="gallery-container">
    <h1>Nuestras Plantas</h1>
    <div class="products-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="<?= $product->getImagePath() ?>" alt="<?= $product->getName() ?>">
                <div class="plant-info">
                    <h3><?= $product->getName() ?></h3>
                    <p class="description"><?= $product->getDescription() ?></p>
                    <p class="price">$<?= number_format($product->getPriceInCents() / 100, 2) ?></p>
                    <button class="add-to-cart" 
                            data-id="<?= $product->getId() ?>" 
                            data-name="<?= $product->getName() ?>" 
                            data-price="<?= $product->getPriceInCents() / 100 ?>">
                        Añadir al Carrito
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>