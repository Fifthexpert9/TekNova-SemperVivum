<?php

namespace Controllers;

use Constants\Routes;
use Core\Auth;
use Core\Database;
use Core\Middleware;
use Enums\Permission;
use Exception;
use Models\Order;
use Models\OrderItem;
use Models\Product;
use Utils\WebUtils;

use Dompdf\Dompdf;

/**
 * Handles order-related requests
 * @package Controllers
 */
class OrderController extends Controller
{
    public static function index()
    {
        Middleware::checkPermission(Permission::BUY_PRODUCT);

        $userId = Auth::getUserId();
        $orders = self::getOrders($userId);

        return self::view('orders/index.view', ['orders' => $orders]);
    }

    public static function orderView()
    {
        Middleware::checkPermission(Permission::BUY_PRODUCT);

        $id = intval($_GET['id']) ?? null;

        if (!$id) {
            WebUtils::redirect(Routes::HOME);
        }

        $userId = Auth::getUserId();
        $order = self::getOrder($id, $userId);

        if ($order === null) {
            WebUtils::redirect(Routes::HOME);
        }

        return self::view('orders/view', ['order' => $order]);
    }

    public static function orderReport()
    {
        Middleware::checkPermission(Permission::BUY_PRODUCT);

        $id = intval($_GET['id']) ?? null;

        if (!$id) {
            WebUtils::redirect(Routes::HOME);
        }

        $user = Auth::getUser();
        $order = self::getOrder($id, $user->getId());

        if (!$order) {
            WebUtils::redirect(Routes::HOME);
        }

        $html = self::view('orders/report.view', ['order' => $order, 'user' => $user]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->render();
        $dompdf->stream('albaran_' . $order->getId() . '.pdf', ['Attachment' => false]);
    }

    public static function createOrder()
    {
        Middleware::checkPermission(Permission::BUY_PRODUCT);
        header('Content-Type: application/json');

        $userId = Auth::getUserId();
        $requestData = json_decode(file_get_contents("php://input"), true);

        if (empty($requestData['cart'])) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "El carrito está vacío"]);
            return;
        }

        $db = Database::getConnection();
        $db->beginTransaction();

        try {
            $totalPriceInCents = array_reduce($requestData['cart'], function ($sum, $item) {
                return $sum + ($item['price'] * 100 * $item['quantity']);
            }, 0);

            $sql = "INSERT INTO orders (user_id, total_in_cents, status, created_at, updated_at) 
                VALUES (:userId, :total, 'pending', NOW(), NOW())";
            $stmt = $db->prepare($sql);
            $stmt->execute(["userId" => $userId, "total" => $totalPriceInCents]);
            $orderId = $db->lastInsertId();

            $sql = "INSERT INTO order_items (order_id, product_id, price_at_purchase_in_cents, quantity, created_at, updated_at)
                VALUES (:orderId, :productId, :price, :quantity, NOW(), NOW())";
            $stmt = $db->prepare($sql);

            foreach ($requestData['cart'] as $item) {
                $stmt->execute([
                    "orderId" => $orderId,
                    "productId" => $item["id"],
                    "price" => $item["price"] * 100,
                    "quantity" => $item["quantity"]
                ]);
            }

            $db->commit();
            echo json_encode(["success" => true, "message" => "Pedido creado con éxito"]);
        } catch (Exception $e) {
            $db->rollback();
            http_response_code(500);
            echo json_encode([
                "success" => false,
                "message" => "Error en la creación del pedido",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Get all orders for a user
     * @param $userId int The user ID
     * @return Order[] The orders
     */
    public static function getOrders($userId)
    {
        $sql = 'SELECT id, user_id, created_at, updated_at FROM orders WHERE user_id = :userId';
        $rows = Database::fetchAll($sql, ['userId' => $userId]);

        $orders = [];
        foreach ($rows as $row) {
            $orders[] = self::getOrder($row['id'], $userId);
        }

        return $orders;
    }

    public static function getOrder($id, $userId)
    {
        $sql = 'SELECT id, user_id, created_at, updated_at 
            FROM orders 
            WHERE id = :id AND user_id = :userId';

        $row = Database::fetch($sql, ['id' => $id, 'userId' => $userId]);

        if (!$row) {
            return null;
        }

        $order = new Order(
            $row['id'],
            $row['user_id'],
            [],
            $row['created_at'],
            $row['updated_at']
        );

        $itemsSql = 'SELECT oi.id, oi.order_id, oi.product_id, oi.quantity, oi.price_at_purchase_in_cents,
                        p.name, p.description, p.price_in_cents, p.image_path
                 FROM order_items oi
                 JOIN products p ON oi.product_id = p.id
                 WHERE oi.order_id = :orderId';

        $items = Database::fetchAll($itemsSql, ['orderId' => $id]);

        foreach ($items as $itemRow) {
            $product = new Product(
                $itemRow['product_id'],
                $itemRow['name'],
                $itemRow['description'],
                $itemRow['price_in_cents'],
                $itemRow['image_path'],
                null,
                null
            );

            $orderItem = new OrderItem(
                $itemRow['id'],
                $itemRow['order_id'],
                $product,
                $itemRow['quantity'],
                $itemRow['price_at_purchase_in_cents']
            );

            $order->addItem($orderItem);
        }

        return $order;
    }
}