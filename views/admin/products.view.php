<?php
/**
 * @var Product[] $products
 */

use Constants\Routes;
use Models\Product;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column align-items-center">
    <section class="d-flex flex-column align-items-center w-100">
        <h1 class="text-center mt-4">Productos Disponibles</h1>
        <a href="<?= Routes::ADMIN_ADD_PRODUCT ?>" class="btn btn-primary mt-3">Agregar Producto</a>

        <div class="container mt-5">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre del Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <img src="<?= $product->getImage() ?>" alt="<?= $product->getName() ?>" style="max-height: 100px; object-fit: contain;" class="img-fluid">
                            </td>
                            <td><?= $product->getName() ?></td>
                            <td><?= $product->getDescription() ?></td>
                            <td><?= $product->printPrice() ?></td>
                            <td>
                                <a href="<?= Routes::ADMIN_EDIT_PRODUCT ?>?id=<?= $product->getId() ?>" class="btn btn-primary">Ver Detalles</a>
                                <form action="<?= Routes::ADMIN_DELETE_PRODUCT ?>?id=<?= $product->getId() ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';