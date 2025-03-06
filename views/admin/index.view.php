<?php

use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column align-items-center">
    <section class="d-flex flex-column align-items-center w-100">
        <h1 class="text-center mb-4">Panel de Administración</h1>

        <div class="container mt-4">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="card text-center border p-4 h-100 d-flex flex-column align-items-center justify-content-between">
                        <h2>Gestión de Productos</h2>
                        <p class="flex-grow-1 text-center">Administra y organiza los productos de la tienda.</p>
                        <div class="w-100 d-flex justify-content-center">
                            <a href="<?= Routes::ADMIN_PRODUCTS ?>" class="btn btn-primary btn-sm">Gestionar Productos</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card text-center border p-4 h-100 d-flex flex-column align-items-center justify-content-between">
                        <h2>Gestión de Usuarios</h2>
                        <p class="flex-grow-1 text-center">Gestiona y supervisa los usuarios registrados.</p>
                        <div class="w-100 d-flex justify-content-center">
                            <a href="<?= Routes::ADMIN_USERS ?>" class="btn btn-primary btn-sm">Gestionar Usuarios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
