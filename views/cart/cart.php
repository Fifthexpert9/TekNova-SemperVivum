<?php

use Constants\Routes;
use Models\Product;

$cssFiles = [
    'landing.css'
];
$jsFiles = [
    'cart.js'
];

?>

<?php require_once __DIR__ . '/../../include/head.include.php'; ?>
<?php require_once __DIR__ . '/../../include/header.include.php';?>


<main>
    <h1>Carrito de Compras</h1>
    <ul id="cart-list"></ul>
<?php 
    /* Comprobación si el carrito está vacío
    if (empty($items)): ?>
        <p>No hay productos en el carrito.</p>
    <?php endif;

    // Inicialización del total
    $total = 0;

    // Primer foreach: Muestra información de productos y calcula total
    foreach ($items as $productId => $quantity):
        $product = Product::find($productId);
        $total += $product->price * $quantity;?>
        <div>
            <h2><?= $product->name ?></h2>
            <p>Precio: $<?= $product->price ?></p>
            <p>Cantidad: <?= $quantity ?></p>
            <p>Subtotal: $<?= $product->price * $quantity ?></p>
        </div>
    <?php endforeach;

    // Segundo foreach: Muestra formularios para eliminar productos
    foreach ($items as $productId => $quantity): ?>
        <div>
            Product ID: <?= $productId ?>, Quantity: <?= $quantity ?>
            <form action="<?= Routes::CART_REMOVE ?>" method="POST">
                <input type="hidden" name="product_id" value="<?= $productId ?>">
                <button type="submit">Remove</button>
            </form>
        </div>
    <?php endforeach; 
    */
?>
</main>