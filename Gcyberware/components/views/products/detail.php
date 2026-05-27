<div class="p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Product Info -->
        <div class="lg:col-span-1">
            <div class="card bg-base-200 shadow-xl">
                <?php if (!empty($product['image'])): ?>
                    <figure>
                        <img src="/Gcyberware/public/uploads/<?= $product['image'] ?>" class="h-64 w-full object-cover">
                    </figure>
                <?php endif; ?>

                <div class="card-body">
                    <h1 class="card-title text-2xl"><?= $product['name'] ?></h1>
                    
                    <p class="text-gray-600"><?= $product['description'] ?></p>
                    
                    <p class="text-3xl font-bold text-primary"><?= number_format($product['price'], 2) ?>€</p>
                    
                    <?php if ($avg_rating): ?>
                        <div class="text-sm mb-4">
                            <div class="badge badge-lg">⭐ <?= round($avg_rating, 1) ?>/5</div>
                            <p class="text-xs text-gray-500 mt-2"><?= count($reviews) ?> Recensioni</p>
                        </div>
                    <?php endif; ?>

                    <a href="/Gcyberware/public/cart_add.php?id=<?= $product['id'] ?>" class="btn btn-primary">
                        Aggiungi al carrello
                    </a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="lg:col-span-2">
            <div class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-xl mb-4">📝 Recensioni (<?= count($reviews) ?>)</h2>

                    <!-- Review Actions for Logged In User -->
                    <?php if ($user): ?>
                        <div class="mb-6 pb-6 border-b">
                            <?php if ($user_review): ?>
                                <div class="alert alert-info mb-4">
                                    <span>Hai già lasciato una recensione. Puoi modificarla o eliminarla.</span>
                                </div>
                                <div class="flex gap-2">
                                    <a href="/Gcyberware/public/review_edit.php?id=<?= $user_review['id'] ?>&product=<?= $product['id'] ?>" class="btn btn-sm btn-info">
                                        ✏️ Modifica Recensione
                                    </a>
                                    <a href="/Gcyberware/public/review_delete.php?id=<?= $user_review['id'] ?>&product=<?= $product['id'] ?>" class="btn btn-sm btn-error" onclick="return confirm('Eliminare questa recensione?')">
                                        🗑️ Elimina Recensione
                                    </a>
                                </div>
                            <?php else: ?>
                                <a href="/Gcyberware/public/review_add.php?product=<?= $product['id'] ?>" class="btn btn-sm btn-success">
                                    ⭐ Scrivi Recensione
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mb-4">
                            <span><a href="/Gcyberware/public/login.php" class="link link-hover">Accedi</a> per lasciare una recensione</span>
                        </div>
                    <?php endif; ?>

                    <!-- Reviews List -->
                    <?php if (count($reviews) > 0): ?>
                        <div class="space-y-4">
                            <?php foreach ($reviews as $r): ?>
                                <div class="border-l-4 border-primary pl-4 py-2">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <p class="font-semibold"><?= $r['username'] ?></p>
                                            <div class="text-sm text-gray-500">
                                                ⭐ <?= str_repeat('★', $r['rating']) . str_repeat('☆', 5 - $r['rating']) ?> (<?= $r['rating'] ?>/5)
                                            </div>
                                        </div>
                                        <p class="text-xs text-gray-400"><?= date('d/m/Y', strtotime($r['created_at'])) ?></p>
                                    </div>
                                    <p class="text-sm"><?= nl2br($r['comment']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 text-center py-4">Nessuna recensione ancora. Sii il primo a scriverne una!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <a href="/Gcyberware/public/shop.php" class="btn btn-outline">← Torna ai Prodotti</a>
    </div>
</div>
