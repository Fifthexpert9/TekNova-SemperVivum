<?php
/**
 * @var Order $order
 * @var User $user
 */

use Models\Order;
use Models\User;

$variablesCss = file_get_contents(__DIR__ . '/../../assets/css/variables.css');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Factura del Pedido - #<?= $order->getId() ?></title>
    <style>
        <?= $variablesCss ?>

        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .info-table {
            width: 100%;
            border: 1px solid #cccccc;
            border-radius: 10px;
            background: #f9f9f9;
            margin-bottom: 10px;
            border-collapse: collapse;
            font-size: 16px;
        }

        .info-table th, .info-table td {
            padding: 5px;
            border: 1px solid #cccccc;
            text-align: left;
        }

        hr {
            height: 1px;
            background: #333;
            margin: 15px 0;
        }

        .table-container {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table-container th {
            background: #f4f4f4;
            text-transform: uppercase;
        }

        .total-section {
            margin-top: 15px;
            text-align: right;
            font-size: 14px;
        }

        .total-section p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Factura del Pedido</h1>

    <table class="info-table">
        <tr>
            <th>Datos del Cliente</th>
            <th>Detalles del Pedido</th>
        </tr>
        <tr>
            <td>
                <strong>Nombre:</strong> <?= $user->getFullName() ?><br>
                <strong>Correo Electrónico:</strong> <?= $user->getEmail() ?>
            </td>
            <td>
                <strong>Número de pedido:</strong> #<?= $order->getId() ?><br>
                <strong>Fecha del pedido:</strong> <?= $order->getCreatedAt() ?>
            </td>
        </tr>
    </table>

    <hr />

    <h2>Datos del Pedido</h2>
    <table class="table-container">
        <thead>
        <tr>
            <th>Ref.</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Importe</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($order->getItems() as $item): ?>
            <tr>
                <td><?= $item->getProduct()->getId() ?></td>
                <td><?= $item->getProduct()->getName() ?></td>
                <td><?= $item->getQuantity() ?></td>
                <td><?= $item->printPriceAtPurchase() ?></td>
                <td><?= $item->printTotalPrice() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total-section">
        <p><strong>Total:</strong> <?= $order->printTotal() ?></p>
    </div>
</body>
</html>
