<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>


<div class="min-h-screen bg-base-200 py-10 px-4">

    <div class="max-w-4xl mx-auto">

        <div class="card bg-base-100 shadow-2xl">

            <div class="card-body">

                <!-- Titolo -->
                <div class="text-center mb-8">

                    <h2 class="text-4xl font-bold text-warning">
                        ✏️ Modifica Prodotto
                    </h2>

                    <p class="text-base-content/70 mt-2">
                        Aggiorna le informazioni del prodotto
                    </p>

                </div>

                <!-- FORM -->
                <form method="POST"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    <!-- Nome -->
                    <div class="form-control">

                        <label class="label">
                            <span class="label-text font-semibold">
                                Nome
                            </span>
                        </label>

                        <input type="text"
                               name="name"
                               value="<?= $product['name'] ?>"
                               class="input input-bordered input-warning w-full"
                               required>

                    </div>

                    <!-- Categoria -->
                    <div class="form-control">

                        <label class="label">
                            <span class="label-text font-semibold">
                                Categoria
                            </span>
                        </label>

                        <select name="category_id"
                                class="select select-bordered select-warning w-full"
                                required>

                            <?php foreach ($categories as $c): ?>

                                <option value="<?= $c['id'] ?>"
                                    <?= $product['category_id'] == $c['id'] ? 'selected' : '' ?>>

                                    <?= $c['name'] ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- Prezzo + Stock -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Prezzo -->
                        <div class="form-control">

                            <label class="label">
                                <span class="label-text font-semibold">
                                    Prezzo (€)
                                </span>
                            </label>

                            <input type="number"
                                   step="0.01"
                                   name="price"
                                   value="<?= $product['price'] ?>"
                                   class="input input-bordered input-warning"
                                   required>

                        </div>

                        <!-- Stock -->
                        <div class="form-control">

                            <label class="label">
                                <span class="label-text font-semibold">
                                    Stock
                                </span>
                            </label>

                            <input type="number"
                                   name="stock"
                                   value="<?= $product['stock'] ?>"
                                   class="input input-bordered input-warning"
                                   required>

                        </div>

                    </div>

                    <!-- Descrizione -->
                    <div class="form-control">

                        <label class="label">
                            <span class="label-text font-semibold">
                                Descrizione
                            </span>
                        </label>

                        <textarea name="description"
                                  class="textarea textarea-bordered textarea-warning h-36"><?= $product['description'] ?></textarea>

                    </div>

                    <!-- Immagine attuale -->
                    <?php if (!empty($product['image'])): ?>

                        <div class="form-control">

                            <label class="label">
                                <span class="label-text font-semibold">
                                    Immagine attuale
                                </span>
                            </label>

                            <div class="flex justify-center">

                                <img src="/Gcyberware/public/uploads/<?= $product['image'] ?>"
                                     width="200"
                                     class="rounded-2xl shadow-lg border border-base-300 object-cover">

                            </div>

                        </div>

                    <?php endif; ?>

                    <!-- Upload nuova immagine -->
                    <div class="form-control">

                        <label class="label">
                            <span class="label-text font-semibold">
                                Nuova immagine (opzionale)
                            </span>
                        </label>

                        <input type="file"
                               name="image"
                               accept="image/*"
                               class="file-input file-input-bordered file-input-warning w-full">

                    </div>

                    <!-- Bottoni -->
                    <div class="flex justify-end gap-3 pt-6">

                        <a href="/Gcyberware/public/products.php"
                           class="btn btn-outline">
                            Annulla
                        </a>

                        <button type="submit"
                                class="btn btn-warning">
                            💾 Aggiorna
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</html>