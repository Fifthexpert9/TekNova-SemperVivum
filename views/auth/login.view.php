<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-wrap flex-column align-items-center">
    <h1 class="text-center mt-4">nicir sesió</h1>
    <p>¿No eres cliente? <a href="/register">Regístrate</a></p>

    <?php require_once __DIR__ . '/../../include/partials/error.partial.php'; ?>

    <form action="<?= Routes::LOGIN ?>" method="POST" class="d-flex flex-column justify-content-center">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="test@example.com" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
        </div>

        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>