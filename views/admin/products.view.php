<?php
use Constants\Routes;

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
                    <tr>
                        <td>
                            <!-- TODO: Replace path to actual product image and avoid using inline styles -->
                            <img src="path/to/product-image.jpg" alt="Nombre del Producto" style="max-height: 100px; object-fit: contain;" class="img-fluid">
                        </td>
                        <td>Nombre del Producto</td>
                        <td>Descripción breve del producto.</td>
                        <td>$XX.XX</td>
                        <td><a href="<?= Routes::ADMIN_EDIT_PRODUCT ?>?id=1" class="btn btn-primary">Ver Detalles</a></td>
                    </tr>
                    <tr>
                        <td>
                            <!-- TODO: Replace path to actual product image and avoid using inline styles -->
                            <img src="path/to/product-image.jpg" alt="Otro Producto" style="max-height: 100px; object-fit: contain;" class="img-fluid">
                        </td>
                        <td>Otro Producto</td>
                        <td>Otra descripción breve.</td>
                        <td>$YY.YY</td>
                        <td><a href="<?= Routes::ADMIN_EDIT_PRODUCT?>?id=2" class="btn btn-primary">Ver Detalles</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
