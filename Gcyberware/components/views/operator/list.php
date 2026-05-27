<head>
<!-- DaisyUI -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

<!-- Tailwind CSS -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold">🎫 Ticket da Gestire</h2>
    </div>

    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-box">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utente</th>
                    <th>Sessione</th>
                    <th>Messaggio</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tickets as $t): ?>
                    <tr class="hover">
                        <td>
                            <span class="badge badge-outline">
                                <?= $t['id'] ?>
                            </span>
                        </td>

                        <td>
                            <?= $t['user_id'] ? "User #".$t['user_id'] : "Anonimo" ?>
                        </td>

                        <td>
                            <span class="text-sm opacity-70">
                                <?= $t['session_id'] ?>
                            </span>
                        </td>

                        <td>
                            <?= htmlspecialchars(substr($t['message'], 0, 50)) ?>...
                        </td>

                        <td>
                            <?php
                            $statusClass = match ($t['status']) {
                                'open' => 'badge-warning',
                                'closed' => 'badge-success',
                                'pending' => 'badge-info',
                                default => 'badge-neutral'
                            };
                            ?>

                            <span class="badge <?= $statusClass ?>">
                                <?= ucfirst($t['status']) ?>
                            </span>
                        </td>

                        <td>
                            <a 
                                href="/Gcyberware/public/operator_view.php?id=<?= $t['id'] ?>"
                                class="btn btn-sm btn-primary"
                            >
                                👁️ Apri
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>