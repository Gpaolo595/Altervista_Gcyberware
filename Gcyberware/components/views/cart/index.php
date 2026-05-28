<div class="p-6">

    <h2 class="text-3xl font-bold mb-4">🛒 Il tuo Carrello</h2>

    <?php if (empty($products)): ?>
        <p>Il carrello è vuoto.</p>
    <?php else: ?>

        <table border="1" cellpadding="8" cellspacing="0" width="100%">
            <tr>
                <th>Prodotto</th>
                <th>Prezzo</th>
                <th>Quantità</th>
                <th>Subtotale</th>
                <th>Azioni</th>
            </tr>

            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= $p['name'] ?></td>
                    <td><?= number_format($p['price'], 2) ?> €</td>

                    <td>
                        <a href="cart_remove_one.php?id=<?= $p['id'] ?>">➖</a>
                        <b><?= $p['qty'] ?></b>
                        <a href="cart_add.php?id=<?= $p['id'] ?>">➕</a>
                    </td>

                    <td><?= number_format($p['subtotal'], 2) ?> €</td>

                    <td>
                        <a href="cart_remove.php?id=<?= $p['id'] ?>">🗑️ Rimuovi tutto</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3 style="margin-top:20px; font-size:20px;">
            Totale: <b><?= number_format($total, 2) ?> €</b>
        </h3>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <a href="/Gcyberware/public/checkout_advanced.php?step=1">
                <button class="btn btn-success">✨ Checkout Avanzato</button>
            </a>
            <a href="/Gcyberware/public/checkout.php">
                <button class="btn btn-outline">Checkout Semplice</button>
            </a>
        </div>

    <?php endif; ?>

</div>
