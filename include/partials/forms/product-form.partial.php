<?php
/**
 * @var ?Product $product
 */

use Constants\Routes;
use Models\Product;

$product = $product ?? null;

$productId = $product ? $product->getId() : '';
$productName = $product ? $product->getName() : '';
$productDescription = $product ? $product->getDescription() : '';
$productPrice = $product ? $product->getPrice() : '';
$productImage = $product ? $product->getImage() : '';

$postUrl = $product ? Routes::ADMIN_EDIT_PRODUCT . '?id=' . $productId : Routes::ADMIN_ADD_PRODUCT;
?>

<main class="d-flex flex-wrap flex-column align-items-center">
    <h1 class="text-center"><?= $product ? 'Editar Producto' : 'Agregar Producto' ?></h1>

    <form action="<?= $postUrl ?>" method="POST" class="row justify-content-center mt-4" enctype="multipart/form-data">
        <?php if ($product) : ?>
            <input type="hidden" name="id" value="<?= $productId ?>">
        <?php endif; ?>
        <div class="col-12 col-md-6 mb-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($productName) ?>" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="description" class="form-label">Descripción del producto</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($productDescription) ?></textarea>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="price" class="form-label">Precio del producto (€)</label>
            <input type="number" class="form-control" id="price" name="price" min="1" step="0.01" value="<?= htmlspecialchars($productPrice) ?>" required>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="image" class="form-label">Imagen del producto</label>
            <input type="file" class="form-control" id="image" name="image" <?= $product ? '' : 'required' ?>>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary"><?= $product ? 'Actualizar Producto' : 'Agregar Producto' ?></button>
        </div>
    </form>
</main>