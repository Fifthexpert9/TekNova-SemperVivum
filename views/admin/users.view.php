<?php
/**
 * @var User[] $users
 */

use Constants\Routes;
use Core\Auth;
use Models\User;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';

$loggedInUserId = Auth::getUserId();
?>

<main class="d-flex flex-column align-items-center">
    <section class="d-flex flex-column align-items-center w-100">
        <h1 class="text-center mt-4">Usuarios Registrados</h1>

        <div class="container mt-5">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="<?= $user->getId() == $loggedInUserId ? 'table-info' : '' ?>">
                        <th scope="row"><?= $user->getId() ?></th>
                        <td>
                            <?= $user->getFullName() ?>
                            <?php if ($user->getId() == $loggedInUserId): ?>
                                <span class="badge bg-primary">Tú</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $user->getEmail() ?></td>
                        <td class="text-uppercase"><?= $user->getRole() ?></td>
                        <td>
                            <a href="<?= Routes::ADMIN_USERS . '/edit?id=' . $user->getId() ?>"
                               class="btn btn-primary <?= $user->getId() == $loggedInUserId ? 'disabled' : '' ?>">
                                Editar
                            </a>
                            <a href="<?= Routes::ADMIN_USERS . '/delete?id=' . $user->getId() ?>"
                               class="btn btn-danger <?= $user->getId() == $loggedInUserId ? 'disabled' : '' ?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';