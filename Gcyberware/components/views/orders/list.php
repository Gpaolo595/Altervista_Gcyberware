<h2>I miei ordini</h2>

<?php if (empty($orders)): ?>
    <p>Nessun ordine effettuato.</p>
<?php else: ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Totale</th>
        <th>Data</th>
        <th>Azioni</th>
    </tr>

    <?php foreach ($orders as $o): ?>
        <tr>
            <td><?= $o['id'] ?></td>
            <td><?= $o['total'] ?> €</td>
            <td><?= $o['created_at'] ?></td>
            <td>
                <a href="/Gcyberware/public/order_view.php?id=<?= $o['id'] ?>">👁️ Dettagli</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>
