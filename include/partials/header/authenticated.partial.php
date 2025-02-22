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

<li class="nav-item">
    <a class="text-uppercase" href="<?= Routes::LOGOUT ?>">Cerrar sesión</a>
</li>