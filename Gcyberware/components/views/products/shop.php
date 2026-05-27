<div class="p-6">

    <h2 class="text-3xl font-bold mb-6">🛍️ Tutti i Prodotti</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($products as $p): ?>
            <div class="card bg-base-200 shadow-xl">
                
                <?php if (!empty($p['image'])): ?>
                    <figure>
                        <img src="/Gcyberware/public/uploads/<?= $p['image'] ?>" class="h-48 w-full object-cover">
                    </figure>
                <?php endif; ?>

                <div class="card-body">
                    <h2 class="card-title"><?= $p['name'] ?></h2>

                    <?php $avg_rating = Review::averageRating($p['id']); ?>
                    <?php if ($avg_rating): ?>
                        <div class="text-sm mb-2">
                            ⭐ <span class="font-semibold"><?= round($avg_rating, 1) ?>/5</span>
                        </div>
                    <?php endif; ?>

                    <p class="text-lg font-bold"><?= number_format($p['price'], 2) ?>€</p>

                    <div class="card-actions justify-between mt-4">
                        <a href="/Gcyberware/public/product.php?id=<?= $p['id'] ?>" class="btn btn-outline btn-info">
                            Dettagli
                        </a>

                        <a href="/Gcyberware/public/cart_add.php?id=<?= $p['id'] ?>" class="btn btn-primary">
                            Aggiungi al carrello
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>
