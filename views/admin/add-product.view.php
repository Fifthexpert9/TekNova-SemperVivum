<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column align-items-center">
    <section class="container mt-4">
        <h1 class="text-center mb-4">Agregar Nuevo Producto</h1>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <form action="<?= Routes::ADMIN_ADD_PRODUCT ?>" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="productName" class="form-label">Nombre del Producto</label>
                            <input type="text" id="productName" name="productName" class="form-control" placeholder="Ingresa el nombre del producto" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="productDescription" class="form-label">Descripción</label>
                            <textarea id="productDescription" name="productDescription" class="form-control" placeholder="Ingresa una breve descripción del producto" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="productPrice" class="form-label">Precio</label>
                            <input type="number" id="productPrice" name="productPrice" class="form-control" step="0.01" placeholder="Ingresa el precio del producto" required>
                        </div>
                        <div class="col-md-6">
                            <label for="productStock" class="form-label">Cantidad en Inventario</label>
                            <input type="number" id="productStock" name="productStock" class="form-control" placeholder="Ingresa la cantidad disponible" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="productCategory" class="form-label">Categoría</label>
                            <select id="productCategory" name="productCategory" class="form-select" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                <option value="electronics">Electrónica</option>
                                <option value="clothing">Ropa</option>
                                <option value="home">Hogar</option>
                                <option value="books">Libros</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="productImage" class="form-label">Imagen del Producto</label>
                            <input type="file" id="productImage" name="productImage" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="productTags" class="form-label">Etiquetas</label>
                            <input type="text" id="productTags" name="productTags" class="form-control" placeholder="Ingresa etiquetas separadas por comas (ej. nuevo, oferta, exclusivo)">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-between">
                            <a href="<?= Routes::ADMIN_PRODUCTS ?>" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
