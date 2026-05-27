<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-base-200 flex items-center justify-center p-6">

    <div class="card w-full max-w-3xl bg-base-100 shadow-2xl">

        <div class="card-body">

            <!-- Titolo -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold text-primary">
                    🛒 Crea Nuovo Prodotto
                </h1>

                <p class="text-base-content/70 mt-2">
                    Inserisci le informazioni del nuovo prodotto
                </p>
            </div>

            <!-- Form -->
            <form method="POST" enctype="multipart/form-data" class="space-y-5">

                <!-- Nome -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">
                            Nome Prodotto
                        </span>
                    </label>

                    <input type="text"
                           name="name"
                           placeholder="Inserisci nome prodotto"
                           class="input input-bordered w-full"
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
                            class="select select-bordered w-full"
                            required>

                        <option value="">
                            -- Seleziona categoria --
                        </option>

                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= $c['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Prezzo + Stock -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">
                                Prezzo (€)
                            </span>
                        </label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               placeholder="0.00"
                               class="input input-bordered"
                               required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">
                                Stock
                            </span>
                        </label>

                        <input type="number"
                               name="stock"
                               placeholder="Quantità disponibile"
                               class="input input-bordered"
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
                              class="textarea textarea-bordered h-32"
                              placeholder="Descrizione prodotto..."></textarea>
                </div>

                <!-- Upload immagine -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-semibold">
                            Immagine Prodotto
                        </span>
                    </label>

                    <input type="file"
                           name="image"
                           accept="image/*"
                           class="file-input file-input-bordered w-full">
                </div>

                <!-- Pulsanti -->
                <div class="flex justify-end gap-3 pt-4">

                    <a href="/Gcyberware/public/products.php"
                       class="btn btn-outline">
                        Annulla
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Crea Prodotto
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>