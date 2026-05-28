<div class="p-6">
    <h2 class="text-3xl font-bold mb-6">🤖 Ticket del Bot</h2>

    <div class="alert alert-info mb-6">
        <span>Ticket generati automaticamente dal bot quando incontra problemi non risolvibili.</span>
    </div>

    <?php if (count($openTickets) > 0): ?>
        <div class="space-y-4">
            <?php foreach ($openTickets as $ticket): ?>
                <div class="card bg-base-200 shadow-lg">
                    <div class="card-body">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="card-title text-lg">
                                    <?= $ticket['urgency'] ?> <?= htmlspecialchars($ticket['id']) ?>
                                </h3>
                                <p class="text-sm text-gray-500 mb-2">
                                    📅 <?= $ticket['created_at'] ?> • Creato da: BOT
                                </p>
                                <p class="text-base mb-3">
                                    <?= htmlspecialchars($ticket['description']) ?>
                                </p>

                                <?php if (!empty($ticket['files'])): ?>
                                    <div class="mb-3">
                                        <h4 class="font-semibold text-sm mb-1">📁 File Coinvolti:</h4>
                                        <ul class="list-disc list-inside text-sm text-gray-600">
                                            <?php foreach ($ticket['files'] as $file): ?>
                                                <li><code class="bg-gray-300 px-1 rounded"><?= htmlspecialchars($file) ?></code></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($ticket['root_cause'])): ?>
                                    <div class="mb-3">
                                        <h4 class="font-semibold text-sm mb-1">🔍 Possibile Causa:</h4>
                                        <p class="text-sm bg-yellow-100 p-2 rounded">
                                            <?= htmlspecialchars($ticket['root_cause']) ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($ticket['resolution_steps'])): ?>
                                    <div>
                                        <h4 class="font-semibold text-sm mb-1">✅ Cosa Serve per Risolvere:</h4>
                                        <ol class="list-decimal list-inside text-sm text-gray-600 space-y-1">
                                            <?php foreach ($ticket['resolution_steps'] as $step): ?>
                                                <li><?= htmlspecialchars($step) ?></li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="ml-4">
                                <a href="/Gcyberware/tickets/<?= htmlspecialchars($ticket['id']) ?>.md" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline">
                                    📄 Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-success">
            <span>✅ Nessun ticket aperto! Il bot sta funzionando correttamente.</span>
        </div>
    <?php endif; ?>
</div>
