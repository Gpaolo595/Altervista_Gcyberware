<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>


<div class="min-h-screen bg-base-200 py-10 px-4">

    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h1 class="text-4xl font-bold text-primary">
                    🛒 Gestione Prodotti
                </h1>

                <p class="text-base-content/70 mt-2">
                    Gestisci il catalogo prodotti del sistema
                </p>
            </div>

            <!-- Bottone aggiungi -->
            <a href="/Gcyberware/public/product_create.php"
               class="btn btn-primary">

                ➕ Aggiungi Prodotto

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
                                <th>Categoria</th>
                                <th>Prezzo</th>
                                <th>Stock</th>
                                <th class="text-center">Azioni</th>
                            </tr>

                        </thead>

                        <!-- Body -->
                        <tbody>

                            <?php foreach ($products as $p): ?>

                                <tr>

                                    <!-- ID -->
                                    <td>
                                        <span class="badge badge-outline">
                                            #<?= $p['id'] ?>
                                        </span>
                                    </td>

                                    <!-- Nome -->
                                    <td class="font-semibold">
                                        <?= $p['name'] ?>
                                    </td>

                                    <!-- Categoria -->
                                    <td>

                                        <?=
                                            $p['category_id']
                                            ? '<span class="badge badge-primary">' . $p['category_id'] . '</span>'
                                            : '<span class="badge badge-ghost">-</span>'
                                        ?>

                                    </td>

                                    <!-- Prezzo -->
                                    <td>

                                        <span class="font-bold text-success">
                                            <?= $p['price'] ?> €
                                        </span>

                                    </td>

                                    <!-- Stock -->
                                    <td>

                                        <?php if ($p['stock'] > 10): ?>

                                            <span class="badge badge-success">
                                                <?= $p['stock'] ?>
                                            </span>

                                        <?php elseif ($p['stock'] > 0): ?>

                                            <span class="badge badge-warning">
                                                <?= $p['stock'] ?>
                                            </span>

                                        <?php else: ?>

                                            <span class="badge badge-error">
                                                Esaurito
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <!-- Azioni -->
                                    <td>

                                        <div class="flex justify-center gap-2 flex-wrap">

                                            <!-- Modifica -->
                                            <a href="/Gcyberware/public/product_edit.php?id=<?= $p['id'] ?>"
                                               class="btn btn-sm btn-warning">

                                                ✏️ Modifica

                                            </a>

                                            <!-- Elimina -->
                                            <a href="/Gcyberware/public/product_delete.php?id=<?= $p['id'] ?>"
                                               class="btn btn-sm btn-error"
                                               onclick="return confirm('Eliminare il prodotto?')">

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