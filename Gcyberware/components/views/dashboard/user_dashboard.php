<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-base-200 p-6">
    
    <!-- Header -->
    <div class="max-w-6xl mx-auto">
        <div class="hero bg-base-100 rounded-2xl shadow-lg mb-6">
            <div class="hero-content text-center py-10">
                <div>
                    <h1 class="text-4xl font-bold">
                        Benvenuto, <?= $user['username'] ?>
                    </h1>
                    <p class="py-2 text-base-content/70">
                        Dashboard personale utente
                    </p>
                </div>
            </div>
        </div>

        <!-- Account + Ticket -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Account -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-primary">
                        📌 Informazioni Account
                    </h2>

                    <div class="space-y-2 mt-4">
                        <div class="flex justify-between">
                            <span class="font-bold">Username</span>
                            <span><?= $user['username'] ?></span>
                        </div>

                        <div class="divider my-1"></div>

                        <div class="flex justify-between">
                            <span class="font-bold">Ruolo</span>
                            <span class="badge badge-primary">
                                <?= $user['role'] ?>
                            </span>
                        </div>

                        <div class="divider my-1"></div>

                        <div class="flex justify-between">
                            <span class="font-bold">Registrato il</span>
                            <span><?= $user['created_at'] ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-secondary">
                        🎫 I tuoi ultimi Ticket
                    </h2>

                    <?php if (empty($tickets)): ?>
                        <div class="alert mt-4">
                            <span>Nessun ticket aperto.</span>
                        </div>
                    <?php else: ?>

                        <div class="overflow-x-auto mt-4">
                            <table class="table table-zebra">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Messaggio</th>
                                        <th>Stato</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($tickets as $t): ?>
                                        <tr>
                                            <td><?= $t['id'] ?></td>

                                            <td>
                                                <?= substr($t['message'], 0, 40) ?>...
                                            </td>

                                            <td>
                                                <span class="badge badge-outline">
                                                    <?= $t['status'] ?>
                                                </span>
                                            </td>

                                            <td><?= $t['created_at'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Chatbot -->
        <div class="card bg-base-100 shadow-xl mt-6">
            <div class="card-body">
                <h2 class="card-title text-accent">
                    💬 Ultimi messaggi con il Chatbot
                </h2>

                <?php if (empty($messages)): ?>
                    <div class="alert mt-4">
                        <span>Nessun messaggio recente.</span>
                    </div>

                <?php else: ?>

                    <div class="space-y-4 mt-4">

                        <?php foreach ($messages as $m): ?>

                            <div class="chat <?= $m['role'] === 'user' ? 'chat-end' : 'chat-start' ?>">

                                <div class="chat-header mb-1">
                                    <?= ucfirst($m['role']) ?>
                                </div>

                                <div class="chat-bubble 
                                    <?= $m['role'] === 'user'
                                        ? 'chat-bubble-primary'
                                        : 'chat-bubble-secondary' ?>">
                                    
                                    <?= nl2br($m['content']) ?>
                                </div>

                                <div class="chat-footer opacity-70 text-xs mt-1">
                                    <?= $m['created_at'] ?>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="card bg-base-100 shadow-xl mt-6">
            <div class="card-body">
                <h2 class="card-title">
                    🔗 Link Rapidi
                </h2>

                <div class="flex flex-wrap gap-4 mt-4">

                    <a href="/Gcyberware/public/chatbot.php"
                       class="btn btn-primary">
                        Apri Chatbot
                    </a>

                    <a href="/Gcyberware/public/operator.php"
                       class="btn btn-secondary">
                        Ticket Operatore
                    </a>

                    <a href="/Gcyberware/public/products.php"
                       class="btn btn-accent">
                        Gestione Prodotti
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>