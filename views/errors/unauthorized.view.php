<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column justify-content-center align-items-center text-center py-5">
    <h1 class="display-3 fw-bold text-danger mb-4">No autorizado</h1>
    <p class="lead mb-4">
        No tienes permiso para acceder a esta página. Si crees que esto es un error, verifica tu cuenta o ponte en contacto con soporte.
    </p>
    <div>
        <a href="<?= Routes::HOME ?>" class="btn btn-success btn-lg me-2">Volver al inicio</a>
    </div>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>
