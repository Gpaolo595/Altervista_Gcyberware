<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>



<div class="min-h-screen bg-base-200 p-6">

    <div class="max-w-5xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h1 class="text-4xl font-bold text-primary">
                     Gestione Categorie
                </h1>

                <p class="text-base-content/70 mt-2">
                    Gestisci tutte le categorie del sistema
                </p>
            </div>

            <!-- Bottone aggiungi -->
            <a href="/Gcyberware/public/category_create.php"
               class="btn btn-primary">
                ➕ Aggiungi Categoria
            </a>

        </div>

        <!-- Card Tabella -->
        <div class="card bg-base-100 shadow-2xl">

            <div class="card-body">

                <div class="overflow-x-auto">

                    <table class="table table-zebra">

                        <!-- Head -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th class="text-center">Azioni</th>
                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody>

                            <?php foreach ($categories as $c): ?>

                                <tr>

                                    <td>
                                        <span class="badge badge-outline">
                                            #<?= $c['id'] ?>
                                        </span>
                                    </td>

                                    <td class="font-semibold">
                                        <?= $c['name'] ?>
                                    </td>

                                    <td>

                                        <div class="flex justify-center gap-2">

                                            <!-- Modifica -->
                                            <a href="/Gcyberware/public/category_edit.php?id=<?= $c['id'] ?>"
                                               class="btn btn-sm btn-warning">
                                                ✏️ Modifica
                                            </a>

                                            <!-- Elimina -->
                                            <a href="/Gcyberware/public/category_delete.php?id=<?= $c['id'] ?>"
                                               class="btn btn-sm btn-error"
                                               onclick="return confirm('Eliminare la categoria?')">

                                                🗑️ Elimina
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

</html>