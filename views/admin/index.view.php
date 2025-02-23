<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';

// TODO: Comprobar si el usuario tiene permisos de administrador
?>

<main class="d-flex flex-column align-items-center">
    <section class="d-flex flex-column align-items-center w-100">
        <h1 class="text-center">Panel de Administración</h1>

        <div class="container mt-5">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card text-center p-4">
                        <h2>Gestión de Productos</h2>
                        <p>Agrega, edita o elimina productos de la tienda.</p>
                        <a href="<?= Routes::ADMIN_PRODUCTS ?>" class="btn btn-primary">Gestionar Productos</a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card text-center p-4">
                        <h2>Gestión de Ofertas</h2>
                        <p>Controla las promociones y descuentos en curso.</p>
                        <a href="<?= Routes::ADMIN_SALES ?>" class="btn btn-primary">Gestionar Ofertas</a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card text-center p-4">
                        <h2>Gestión de Usuarios</h2>
                        <p>Visualiza y administra la información de los usuarios.</p>
                        <a href="<?= Routes::ADMIN_USERS ?>" class="btn btn-primary">Gestionar Usuarios</a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card text-center p-4">
                        <h2>Gestión de Pedidos</h2>
                        <p>Consulta y administra los pedidos.</p>
                        <a href="<?= Routes::ADMIN_ORDERS ?>" class="btn btn-primary">Gestionar Pedidos</a>
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
