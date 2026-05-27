<h2>Ordine #<?= $order['id'] ?></h2>

<p><b>Totale:</b> <?= $order['total'] ?> €</p>
<p><b>Data:</b> <?= $order['created_at'] ?></p>

<h3>Prodotti</h3>

<table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
    <tr>
        <th>Prodotto</th>
        <th>Prezzo</th>
        <th>Quantità</th>
        <th>Totale</th>
        <th>Azioni</th>
    </tr>

    <?php foreach ($items as $i): ?>
        <?php $user_review = Review::findUserReview($i['product_id'], $user['id']); ?>
        <tr>
            <td><?= $i['name'] ?></td>
            <td><?= $i['price'] ?> €</td>
            <td><?= $i['quantity'] ?></td>
            <td><?= $i['price'] * $i['quantity'] ?> €</td>
            <td>
                <?php if ($user_review): ?>
                    <a href="/Gcyberware/public/review_edit.php?id=<?= $user_review['id'] ?>&product=<?= $i['product_id'] ?>" class="btn btn-sm btn-info">
                        ✏️ Modifica
                    </a>
                    <a href="/Gcyberware/public/review_delete.php?id=<?= $user_review['id'] ?>&product=<?= $i['product_id'] ?>" class="btn btn-sm btn-error" onclick="return confirm('Eliminare?')">
                        🗑️ Elimina
                    </a>
                <?php else: ?>
                    <a href="/Gcyberware/public/review_add.php?product=<?= $i['product_id'] ?>" class="btn btn-sm btn-success">
                        ⭐ Recensisci
                    </a>
                <?php endif; ?>
                <a href="/Gcyberware/public/product.php?id=<?= $i['product_id'] ?>" class="btn btn-sm btn-outline">
                    Vedi Prodotto
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="mt-4">
    <a href="/Gcyberware/public/orders.php" class="btn">← Torna agli Ordini</a>
</div>
