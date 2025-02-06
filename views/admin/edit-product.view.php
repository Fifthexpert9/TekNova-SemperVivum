<?php

use Controllers\ProductController;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';

$product = ProductController::getById(intval($_GET['id']));
?>

<main class="d-flex flex-column align-items-center">
    <section class="container mt-4">
        <h1 class="text-center mb-4">Editar Producto</h1>
        <div class="row justify-content-center">
            <?php include __DIR__ . '/../../include/partials/forms/product-form.partial.php'; ?>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';