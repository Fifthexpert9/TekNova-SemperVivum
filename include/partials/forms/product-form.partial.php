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

<form action="<?= $postUrl ?>" method="POST" class="w-75" enctype="multipart/form-data">
    <?php if ($product) : ?>
        <input type="hidden" name="id" value="<?= $productId ?>">
    <?php endif; ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nombre del producto</label>
        <input class="form-control" id="name" name="name" value="<?= htmlspecialchars($productName) ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripción del producto</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($productDescription) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Precio del producto (€)</label>
        <input type="number" class="form-control" id="price" name="price" min="1" step="0.01" value="<?= htmlspecialchars($productPrice) ?>" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen del producto</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <?php if ($productImage) : ?>
        <div class="mb-3">
            <img src="<?= $productImage ?>" alt="<?= $product->getName() ?>" class="img-thumbnail" style="max-width: 200px;">
        </div>
    <?php endif; ?>
    <a href="<?= Routes::ADMIN_PRODUCTS ?>" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary"><?= $product ? 'Actualizar' : 'Crear' ?></button>
</form>