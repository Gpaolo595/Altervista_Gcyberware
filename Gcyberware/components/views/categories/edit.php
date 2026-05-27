<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>



<div class="min-h-screen bg-base-200 flex items-center justify-center p-6">

    <div class="card w-full max-w-xl bg-base-100 shadow-2xl">

        <div class="card-body">

            <!-- Titolo -->
            <div class="text-center mb-6">

                <h1 class="text-4xl font-bold text-warning">
                    ✏️ Modifica Categoria
                </h1>

                <p class="text-base-content/70 mt-2">
                    Aggiorna il nome della categoria selezionata
                </p>

            </div>

            <!-- Form -->
            <form method="POST" class="space-y-5">

                <!-- Nome -->
                <div class="form-control">

                    <label class="label">
                        <span class="label-text font-semibold">
                            Nome Categoria
                        </span>
                    </label>

                    <input type="text"
                           name="name"
                           value="<?= $category['name'] ?>"
                           placeholder="Inserisci nome categoria"
                           class="input input-bordered input-warning w-full"
                           required>

                </div>

                <!-- Pulsanti -->
                <div class="flex justify-end gap-3 pt-4">

                    <a href="/Gcyberware/public/categories.php"
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

</html>