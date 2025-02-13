<?php
$jsFiles = [
    'add-edit-product.js'
];

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column align-items-center">
    <section class="container mt-4">
        <h1 class="text-center mb-4">Agregar Nuevo Producto</h1>
        <div class="row justify-content-center">
            <?php include __DIR__ . '/../../include/partials/forms/product-form.partial.php'; ?>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
