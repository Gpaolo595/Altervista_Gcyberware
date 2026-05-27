<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Order.php";
require_once COMPONENTS_PATH . "/models/OrderItem.php";
require_once COMPONENTS_PATH . "/models/Review.php";

require_login();

$user = current_user();
$order_id = intval($_GET['id'] ?? 0);
$order = Order::find($order_id);

if (!$order || $order['user_id'] != $user['id']) {
    header("Location: /Gcyberware/public/orders.php");
    exit;
}

$items = OrderItem::findByOrder($order_id);

include COMPONENTS_PATH . "/views/partials/navbar.php";
?>

<div class="p-6">
    <div class="card bg-base-200 shadow-xl mb-6">
        <div class="card-body">
            <h2 class="card-title text-2xl">Ordine #<?= $order['id'] ?></h2>
            <p class="text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></p>
            <p class="text-lg font-bold">Totale: €<?= number_format($order['total'], 2) ?></p>
        </div>
    </div>

    <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
            <h3 class="card-title text-lg mb-4">Prodotti Ordinati</h3>
            
            <?php foreach ($items as $item): ?>
                <?php $user_review = Review::findUserReview($item['product_id'], $user['id']); ?>
                <div class="border rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <p class="font-semibold"><?= $item['name'] ?></p>
                            <p class="text-sm text-gray-600">
                                €<?= number_format($item['price'], 2) ?> x <?= $item['quantity'] ?> = 
                                <span class="font-bold">€<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                            </p>
                        </div>
                    </div>

                    <!-- Review Actions -->
                    <div class="flex gap-2 mt-3">
                        <?php if ($user_review): ?>
                            <a href="/Gcyberware/public/review_edit.php?id=<?= $user_review['id'] ?>&product=<?= $item['product_id'] ?>" class="btn btn-sm btn-info">
                                ✏️ Modifica Recensione
                            </a>
                            <a href="/Gcyberware/public/review_delete.php?id=<?= $user_review['id'] ?>&product=<?= $item['product_id'] ?>" class="btn btn-sm btn-error" onclick="return confirm('Eliminare questa recensione?')">
                                🗑️ Elimina Recensione
                            </a>
                        <?php else: ?>
                            <a href="/Gcyberware/public/review_add.php?product=<?= $item['product_id'] ?>" class="btn btn-sm btn-success">
                                ⭐ Scrivi Recensione
                            </a>
                        <?php endif; ?>
                        
                        <a href="/Gcyberware/public/product.php?id=<?= $item['product_id'] ?>" class="btn btn-sm btn-outline">
                            Vedi Prodotto
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="mt-6 flex gap-2">
        <a href="/Gcyberware/public/orders.php" class="btn btn-outline">← Torna agli Ordini</a>
        <a href="/Gcyberware/public/shop.php" class="btn btn-outline">Continua Shopping</a>
    </div>
</div>
