<?php

use Constants\Routes;
use Models\Product;

$cssFiles = [
    'landing.css',
    'global.css'
];
$jsFiles = [
    'cart.js'
];

?>

<?php require_once __DIR__ . '/../../include/head.include.php'; ?>
<?php require_once __DIR__ . '/../../include/header.include.php'; ?>


<main>
    <h1 class="font-title">Carrito de compras</h1>
    <ul id="cart-list" class="p-0"></ul>
    <button class="btn btn-primary create-order">Tramitar pedido</button>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>