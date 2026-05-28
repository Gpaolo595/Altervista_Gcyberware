<div class="p-6">
    <h2 class="text-3xl font-bold mb-6">⭐ Gestione Prodotti in Evidenza</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Sezione: Prodotti In Evidenza -->
        <div>
            <h3 class="text-2xl font-bold mb-4">✨ In Evidenza (<?= count($featured_products) ?>)</h3>
            
            <?php if (count($featured_products) > 0): ?>
                <div class="space-y-3">
                    <?php foreach ($featured_products as $p): ?>
                        <div class="card bg-yellow-100 border-2 border-yellow-400">
                            <div class="card-body p-4">
                                <h4 class="font-semibold"><?= htmlspecialchars($p['name']) ?></h4>
                                <p class="text-sm text-gray-600">Prezzo: <?= number_format($p['price'], 2) ?>€</p>
                                <form method="POST" class="mt-2">
                                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                    <input type="hidden" name="featured" value="0">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        🗑️ Rimuovi da Evidenza
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <span>Nessun prodotto in evidenza. Aggiungine uno!</span>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sezione: Aggiungi a Evidenza -->
        <div>
            <h3 class="text-2xl font-bold mb-4">➕ Aggiungi a Evidenza</h3>
            
            <div class="space-y-3">
                <?php foreach ($all_products as $p): ?>
                    <?php if ($p['featured'] == 0): ?>
                        <div class="card bg-base-200">
                            <div class="card-body p-4">
                                <h4 class="font-semibold"><?= htmlspecialchars($p['name']) ?></h4>
                                <p class="text-sm text-gray-600">Prezzo: <?= number_format($p['price'], 2) ?>€</p>
                                <form method="POST" class="mt-2">
                                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                                    <input type="hidden" name="featured" value="1">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        ⭐ Aggiungi a Evidenza
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
