<div class="p-6">
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-4">⭐ Scrivi una Recensione</h2>
                <p class="mb-6 text-gray-600"><?= $product['name'] ?? 'Prodotto' ?></p>

                <form method="POST" class="space-y-4">
                    <!-- Rating -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Valutazione</span>
                        </label>
                        <div class="rating rating-lg gap-2">
                            <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-orange-400" required />
                            <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-orange-400" />
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Commento</span>
                        </label>
                        <textarea name="comment" class="textarea textarea-bordered" placeholder="Condividi la tua esperienza con questo prodotto..." rows="5" required></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-2 mt-6">
                        <button type="submit" class="btn btn-primary">Invia Recensione</button>
                        <a href="/Gcyberware/public/product.php?id=<?= $product_id ?>" class="btn btn-outline">Annulla</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
