<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Product.php";
require_once COMPONENTS_PATH . "/models/Review.php";

$featured_products = Product::featured();
$all_products = Product::all();

include COMPONENTS_PATH . "/views/partials/navbar.php";
?>

<div class="p-6">
    <!-- SEZIONE PRODOTTI IN EVIDENZA -->
    <?php if (count($featured_products) > 0): ?>
        <div class="mb-8">
            <h2 class="text-3xl font-bold mb-4">⭐ Prodotti in Evidenza</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($featured_products as $p): ?>
                    <div class="card bg-yellow-50 shadow-xl border-2 border-yellow-300">
                        <?php if (!empty($p['image'])): ?>
                            <figure>
                                <img src="/Gcyberware/public/uploads/<?= htmlspecialchars($p['image']) ?>" class="h-48 w-full object-cover">
                            </figure>
                        <?php endif; ?>

                        <div class="card-body">
                            <div class="badge badge-warning">IN EVIDENZA</div>
                            <h2 class="card-title"><?= htmlspecialchars($p['name']) ?></h2>

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
                                    Aggiungi
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- SEZIONE TUTTI I PRODOTTI -->
    <h2 class="text-3xl font-bold mb-6">🛍️ Tutti i Prodotti</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($all_products as $p): ?>
            <?php if ($p['featured'] == 0): ?>
                <div class="card bg-base-200 shadow-xl">
                    <?php if (!empty($p['image'])): ?>
                        <figure>
                            <img src="/Gcyberware/public/uploads/<?= htmlspecialchars($p['image']) ?>" class="h-48 w-full object-cover">
                        </figure>
                    <?php endif; ?>

                    <div class="card-body">
                        <h2 class="card-title"><?= htmlspecialchars($p['name']) ?></h2>

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
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>