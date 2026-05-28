

<!-- DaisyUI + Tailwind -->
<link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-base-200 flex items-center justify-center p-6">

    <div class="card w-full max-w-2xl bg-base-100 shadow-2xl">
        
        <div class="card-body">

            <!-- Titolo -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-bold text-primary">
                    Dashboard Admin
                </h1>

                <p class="text-base-content/70 mt-2">
                    Pannello di gestione amministratore
                </p>
            </div>

            <!-- Menu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Gestione Utenti -->
                <a href="/Gcyberware/public/admin_users.php"
                   class="card bg-primary text-primary-content shadow-lg hover:scale-105 transition duration-300">

                    <div class="card-body items-center text-center">
                        <div class="text-5xl">👥</div>

                        <h2 class="card-title">Gestione Utenti</h2>
                        <p class="text-sm opacity-80">
                            Visualizza e gestisci tutti gli utenti
                        </p>

                    </div>
                </a>

                <!-- Prodotti -->
                <a href="/Gcyberware/public/products.php"
                   class="card bg-secondary text-secondary-content shadow-lg hover:scale-105 transition duration-300">

                    <div class="card-body items-center text-center">
                        <div class="text-5xl">🛒</div>

                        <h2 class="card-title">Gestione Prodotti</h2>
                        <p class="text-sm opacity-80">
                            Modifica e aggiorna il catalogo
                        </p>

                    </div>
                </a>

                <!-- Ticket Support Utenti -->
                <a href="/Gcyberware/public/operator.php"
                   class="card bg-accent text-accent-content shadow-lg hover:scale-105 transition duration-300">

                    <div class="card-body items-center text-center">
                        <div class="text-5xl">🎫</div>

                        <h2 class="card-title">Gestione Ticket</h2>
                        <p class="text-sm opacity-80">
                            Controlla richieste e supporto utenti
                        </p>

                    </div>
                </a>

                <!-- Ticket Bot -->
                <a href="/Gcyberware/public/admin_bot_tickets.php"
                   class="card bg-warning text-warning-content shadow-lg hover:scale-105 transition duration-300">

                    <div class="card-body items-center text-center">
                        <div class="text-5xl">🤖</div>

                        <h2 class="card-title">Ticket Bot</h2>
                        <p class="text-sm opacity-80">
                            Problemi segnalati dal sistema
                        </p>

                    </div>
                </a>

            </div>

        </div>
    </div>

</div>
</html>