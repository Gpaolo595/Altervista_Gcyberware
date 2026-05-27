<div class="p-6">
    <h2 class="text-3xl font-bold mb-6">⭐ Gestione Recensioni</h2>

    <?php if (count($reviews) > 0): ?>
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Utente</th>
                        <th>Prodotto</th>
                        <th>Valutazione</th>
                        <th>Commento</th>
                        <th>Data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $r): ?>
                        <tr>
                            <td class="font-semibold"><?= $r['username'] ?></td>
                            <td><?= $r['product_name'] ?></td>
                            <td>
                                <div class="badge badge-lg">
                                    ⭐ <?= $r['rating'] ?>/5
                                </div>
                            </td>
                            <td class="max-w-xs truncate"><?= $r['comment'] ?></td>
                            <td class="text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($r['created_at'])) ?></td>
                            <td>
                                <button class="btn btn-sm btn-error" onclick="deleteReview(<?= $r['id'] ?>)">
                                    🗑️ Elimina
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            <span>Nessuna recensione ancora nel sistema.</span>
        </div>
    <?php endif; ?>
</div>

<script>
function deleteReview(reviewId) {
    if (confirm('Sei sicuro di voler eliminare questa recensione?')) {
        window.location.href = `/Gcyberware/public/admin_reviews_delete.php?id=${reviewId}`;
    }
}
</script>
