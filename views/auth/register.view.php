<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-wrap flex-column align-items-center">
    <h1>Registrarse</h1>
    <p>¿Ya eres cliente? <a href="/login">Iniciar sesión</a></p>

    <?php require_once __DIR__ . '/../../include/partials/error.partial.php'; ?>

    <form action="<?= Routes::REGISTER ?>" method="POST" class="row justify-content-center mt-4">
        <div class="col-md-6 mb-3">
            <label for="first-name" class="form-label">Nombre</label>
            <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Tu nombre" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="last-name" class="form-label">Apellidos</label>
            <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Tus apellidos" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="test@example.com" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>