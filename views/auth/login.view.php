<?php
use Constants\Routes;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-wrap flex-column align-items-center">
    <h1 class="text-center">Iniciar sesión</h1>
    <p>¿No eres cliente? <a href="/register">Regístrate</a></p>

    <?php require_once __DIR__ . '/../../include/partials/error.partial.php'; ?>

    <form action="<?= Routes::LOGIN ?>" method="POST" class="w-75 mt-4">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="test@example.com" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>