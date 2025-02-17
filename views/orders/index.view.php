<?php
/**
 * @var Order[] $orders
 */

use Constants\Routes;
use Models\Order;

require_once __DIR__ . '/../../include/head.include.php';
require_once __DIR__ . '/../../include/header.include.php';
?>

<main class="d-flex flex-column flex-wrap align-items-center">
    <h1>Tus pedidos</h1>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?php foreach ($orders as $order): ?>
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title">Pedido número: #<?= $order->getId() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total: <?= $order->printTotal() ?></h6>
                    <p class="card-text">Número de artículos: <?= count($order->getItems()) ?></p>
                    <p class="card-text">Pedido el: <?= $order->getCreatedAt() ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= Routes::ORDER_REPORT ?>?id=<?= $order->getId() ?>" class="card-link">Ver albarán</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php
require_once __DIR__ . '/../../include/footer.include.php';
require_once __DIR__ . '/../../include/scripts.include.php';
?>