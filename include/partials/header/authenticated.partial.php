<?php
use Constants\Routes;
use Core\Auth;
use Enums\UserRole;

$user = Auth::getUser();
?>

<?php if (Auth::hasRole(UserRole::ADMIN)): ?>
    <?php include __DIR__ . '/role.admin.partial.php'; ?>
<?php endif; ?>

<?php if (Auth::hasRole(UserRole::USER)): ?>
    <?php include __DIR__ . '/role.user.partial.php'; ?>
<?php endif; ?>

<form action="<?= Routes::LOGOUT ?>" method="POST">
    <!-- TODO: Reemplazar con un botón -->
    <button type="submit" class="btn btn-link text-uppercase grow">Cerrar sesión</button>
    <!-- TODO: Añadir más información del usuario -->
</form>
<!-- TODO: Añadir el carrito -->