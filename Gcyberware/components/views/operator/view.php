<head>
<!-- DaisyUI -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

<!-- Tailwind CSS -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<div class="p-6 max-w-5xl mx-auto">

    <!-- Header Ticket -->
    <div class="card bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <h2 class="card-title text-3xl">
                🎫 Ticket #<?= $ticket['id'] ?>
            </h2>

            <div class="mt-2">
                <p>
                    <span class="font-bold">Utente:</span>
                    <?=
                        $ticket['user_id']
                        ? "User #".$ticket['user_id']
                        : "Anonimo"
                    ?>
                </p>
            </div>

            <div class="divider"></div>

            <div>
                <h3 class="font-bold text-lg mb-2">
                    Messaggio utente
                </h3>

                <div class="bg-base-200 rounded-box p-4 whitespace-pre-line">
                    <?= nl2br(htmlspecialchars($ticket['message'])) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Risposte Operatore -->
    <div class="card bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <h3 class="card-title text-2xl">
                💬 Risposte Operatore
            </h3>

            <?php if (empty($responses)): ?>
                <div class="alert">
                    <span>Nessuna risposta ancora.</span>
                </div>
            <?php else: ?>

                <div class="space-y-4">
                    <?php foreach ($responses as $r): ?>
                        <div class="chat chat-start bg-base-200 p-4 rounded-box">
                            <div class="chat-header font-bold">
                                <?= htmlspecialchars($r['operator_name']) ?>
                            </div>

                            <div class="chat-bubble whitespace-pre-line">
                                <?= nl2br(htmlspecialchars($r['response'])) ?>
                            </div>

                            <div class="text-xs opacity-70 mt-2">
                                <?= $r['created_at'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <!-- Form Risposta -->
    <div class="card bg-base-100 shadow-xl mb-6">
        <div class="card-body">
            <h3 class="card-title text-2xl">
                ✍️ Aggiungi Risposta
            </h3>

            <form method="POST" class="space-y-4">
                <textarea
                    name="response"
                    class="textarea textarea-bordered w-full h-40"
                    placeholder="Scrivi la risposta..."
                    required
                ></textarea>

                <button type="submit" class="btn btn-primary">
                    Invia Risposta
                </button>
            </form>
        </div>
    </div>

    <!-- Azioni -->
    <div class="flex gap-3">
        <a
            href="/Gcyberware/public/operator_close.php?id=<?= $ticket['id'] ?>"
            class="btn btn-error"
        >
            ❌ Chiudi Ticket
        </a>

    </div>

</div>