<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">🛍️ Gestione Prodotti</h2>
        <a href="/Gcyberware/public/product_create.php" class="btn btn-primary">
            ➕ Nuovo Prodotto
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="card bg-blue-100">
            <div class="card-body text-center">
                <h3 class="text-2xl font-bold"><?= count($products) ?></h3>
                <p class="text-gray-600">Prodotti Totali</p>
            </div>
        </div>
        <div class="card bg-yellow-100">
            <div class="card-body text-center">
                <h3 class="text-2xl font-bold"><?= $featured_count ?></h3>
                <p class="text-gray-600">In Evidenza</p>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <a href="/Gcyberware/public/admin_featured.php" class="btn btn-warning">
            ⭐ Gestisci Evidenza
        </a>
    </div>

    <?php if (count($products) > 0): ?>
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Prezzo</th>
                        <th>Stock</th>
                        <th>In Evidenza</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td class="font-semibold"><?= htmlspecialchars($p['name']) ?></td>
                            <td><?= number_format($p['price'], 2) ?>€</td>
                            <td>
                                <span class="badge <?= $p['stock'] > 0 ? 'badge-success' : 'badge-error' ?>">
                                    <?= $p['stock'] ?>
                                </span>
                            </td>
                            <td>
                                <?= $p['featured'] == 1 ? '⭐ Sì' : '❌ No' ?>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="/Gcyberware/public/product_edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-info">
                                        ✏️ Modifica
                                    </a>
                                    <a href="/Gcyberware/public/product_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-error"
                                       onclick="return confirm('Elimina questo prodotto?')">
                                        🗑️ Elimina
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <span>Nessun prodotto nel sistema. <a href="/Gcyberware/public/product_create.php" class="link">Creane uno!</a></span>
        </div>
    <?php endif; ?>
</div>
