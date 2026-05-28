<div class="p-6">
    <!-- Progress Bar -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold mb-4">🛒 Checkout</h2>
        <div class="flex justify-between items-center mb-6">
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center <?= $step >= 1 ? 'text-primary' : 'text-gray-400' ?>">
                        <div class="w-10 h-10 rounded-full bg-<?= $step >= 1 ? 'primary' : 'gray-300' ?> flex items-center justify-center text-white font-bold">
                            1
                        </div>
                        <span class="text-sm mt-2">Carrello</span>
                    </div>
                    <div class="flex-1 h-1 mx-2 bg-<?= $step >= 2 ? 'primary' : 'gray-300' ?>"></div>
                    <div class="flex flex-col items-center <?= $step >= 2 ? 'text-primary' : 'text-gray-400' ?>">
                        <div class="w-10 h-10 rounded-full bg-<?= $step >= 2 ? 'primary' : 'gray-300' ?> flex items-center justify-center text-white font-bold">
                            2
                        </div>
                        <span class="text-sm mt-2">Spedizione</span>
                    </div>
                    <div class="flex-1 h-1 mx-2 bg-<?= $step >= 3 ? 'primary' : 'gray-300' ?>"></div>
                    <div class="flex flex-col items-center <?= $step >= 3 ? 'text-primary' : 'text-gray-400' ?>">
                        <div class="w-10 h-10 rounded-full bg-<?= $step >= 3 ? 'primary' : 'gray-300' ?> flex items-center justify-center text-white font-bold">
                            3
                        </div>
                        <span class="text-sm mt-2">Pagamento</span>
                    </div>
                    <div class="flex-1 h-1 mx-2 bg-<?= $step >= 4 ? 'primary' : 'gray-300' ?>"></div>
                    <div class="flex flex-col items-center <?= $step >= 4 ? 'text-primary' : 'text-gray-400' ?>">
                        <div class="w-10 h-10 rounded-full bg-<?= $step >= 4 ? 'primary' : 'gray-300' ?> flex items-center justify-center text-white font-bold">
                            4
                        </div>
                        <span class="text-sm mt-2">Conferma</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-error mb-6">
            <span><?= htmlspecialchars($error) ?></span>
        </div>
    <?php endif; ?>

    <!-- STEP 1: Riepilogo Carrello -->
    <?php if ($step == 1): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-4">📦 Riepilogo Carrello</h3>
                <div class="space-y-3">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="card bg-base-200">
                            <div class="card-body p-4 flex flex-row justify-between items-center">
                                <div class="flex-1">
                                    <h4 class="font-semibold"><?= htmlspecialchars($item['name']) ?></h4>
                                    <p class="text-sm text-gray-600">
                                        <?= $item['quantity'] ?> x <?= number_format($item['price'], 2) ?>€
                                    </p>
                                </div>
                                <div class="font-bold text-lg">
                                    <?= number_format($item['total'], 2) ?>€
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div>
                <div class="card bg-primary text-primary-content shadow-lg sticky top-6">
                    <div class="card-body">
                        <h3 class="card-title">Totale Carrello</h3>
                        <div class="divider my-2"></div>
                        <div class="flex justify-between mb-4">
                            <span>Subtotale:</span>
                            <span class="font-bold"><?= number_format($total, 2) ?>€</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <span>Spedizione:</span>
                            <span class="font-bold">Calcolata al step 2</span>
                        </div>
                        <div class="divider my-2"></div>
                        <div class="flex justify-between text-lg mb-4">
                            <span>Totale Stimato:</span>
                            <span class="font-bold"><?= number_format($total, 2) ?>€</span>
                        </div>

                        <form method="POST" class="w-full">
                            <input type="hidden" name="step" value="1">
                            <button type="submit" class="btn btn-success btn-block">
                                ✓ Continua verso Spedizione
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- STEP 2: Dati Spedizione -->
    <?php elseif ($step == 2): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-4">📍 Indirizzo di Spedizione</h3>
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="step" value="2">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Nome Completo</span>
                        </label>
                        <input type="text" name="shipping_name" placeholder="es. Mario Rossi" class="input input-bordered" required 
                               value="<?= htmlspecialchars($_POST['shipping_name'] ?? $user['name'] ?? '') ?>">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Indirizzo</span>
                        </label>
                        <input type="text" name="shipping_address" placeholder="es. Via Roma 123" class="input input-bordered" required
                               value="<?= htmlspecialchars($_POST['shipping_address'] ?? '') ?>">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Città</span>
                            </label>
                            <input type="text" name="shipping_city" placeholder="es. Roma" class="input input-bordered" required
                                   value="<?= htmlspecialchars($_POST['shipping_city'] ?? '') ?>">
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">CAP</span>
                            </label>
                            <input type="text" name="shipping_postal" placeholder="es. 00100" class="input input-bordered" required
                                   value="<?= htmlspecialchars($_POST['shipping_postal'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Paese</span>
                        </label>
                        <input type="text" name="shipping_country" placeholder="es. Italia" class="input input-bordered" required
                               value="<?= htmlspecialchars($_POST['shipping_country'] ?? 'Italia') ?>">
                    </div>

                    <div class="flex gap-3 mt-6">
                        <a href="/Gcyberware/public/checkout_advanced.php?step=1" class="btn btn-outline flex-1">
                            ← Indietro
                        </a>
                        <button type="submit" class="btn btn-success flex-1">
                            ✓ Continua verso Pagamento
                        </button>
                    </div>
                </form>
            </div>

            <!-- Riepilogo Laterale -->
            <div>
                <div class="card bg-base-200 shadow-lg sticky top-6">
                    <div class="card-body">
                        <h3 class="card-title mb-4">📦 Riepilogo</h3>
                        <div class="space-y-2 text-sm mb-4">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="flex justify-between">
                                    <span><?= htmlspecialchars($item['name']) ?> x<?= $item['quantity'] ?></span>
                                    <span class="font-bold"><?= number_format($item['total'], 2) ?>€</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="divider my-2"></div>
                        <div class="flex justify-between text-lg">
                            <span>Totale:</span>
                            <span class="font-bold"><?= number_format($total, 2) ?>€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- STEP 3: Metodo di Pagamento -->
    <?php elseif ($step == 3): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-4">💳 Metodo di Pagamento</h3>
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="step" value="3">

                    <div class="space-y-3">
                        <label class="card bg-base-200 cursor-pointer hover:bg-base-300">
                            <div class="card-body p-4">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="credit_card" class="radio" checked required>
                                    <span class="ml-4 font-semibold">💳 Carta di Credito</span>
                                </div>
                                <p class="text-sm text-gray-600 ml-8 mt-2">Visa, Mastercard, American Express</p>
                            </div>
                        </label>

                        <label class="card bg-base-200 cursor-pointer hover:bg-base-300">
                            <div class="card-body p-4">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="paypal" class="radio" required>
                                    <span class="ml-4 font-semibold">🅿️ PayPal</span>
                                </div>
                                <p class="text-sm text-gray-600 ml-8 mt-2">Accedi al tuo account PayPal</p>
                            </div>
                        </label>

                        <label class="card bg-base-200 cursor-pointer hover:bg-base-300">
                            <div class="card-body p-4">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="bank_transfer" class="radio" required>
                                    <span class="ml-4 font-semibold">🏦 Bonifico Bancario</span>
                                </div>
                                <p class="text-sm text-gray-600 ml-8 mt-2">Riceverai le coordinate bancarie</p>
                            </div>
                        </label>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <a href="/Gcyberware/public/checkout_advanced.php?step=2" class="btn btn-outline flex-1">
                            ← Indietro
                        </a>
                        <button type="submit" class="btn btn-success flex-1">
                            ✓ Vai a Conferma
                        </button>
                    </div>
                </form>
            </div>

            <!-- Riepilogo Laterale -->
            <div>
                <div class="card bg-base-200 shadow-lg sticky top-6">
                    <div class="card-body">
                        <h3 class="card-title mb-4">📦 Riepilogo</h3>
                        <div class="space-y-2 text-sm mb-4">
                            <?php $shipping = $_SESSION['checkout_shipping'] ?? []; ?>
                            <p class="font-semibold">📍 Spedizione:</p>
                            <p><?= htmlspecialchars($shipping['name'] ?? '') ?></p>
                            <p class="text-gray-600"><?= htmlspecialchars($shipping['address'] ?? '') ?></p>
                            <p class="text-gray-600"><?= htmlspecialchars(($shipping['postal'] ?? '') . ' ' . ($shipping['city'] ?? '')) ?></p>
                        </div>
                        <div class="divider my-2"></div>
                        <div class="flex justify-between text-lg">
                            <span>Totale:</span>
                            <span class="font-bold"><?= number_format($total, 2) ?>€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- STEP 4: Conferma Finale -->
    <?php elseif ($step == 4): ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <h3 class="text-2xl font-bold mb-4">✅ Conferma Ordine</h3>
                
                <div class="space-y-4">
                    <!-- Riepilogo Carrello -->
                    <div class="card bg-base-100 border-2 border-success">
                        <div class="card-body">
                            <h4 class="card-title text-lg mb-3">📦 Prodotti</h4>
                            <div class="space-y-2">
                                <?php foreach ($cart_items as $item): ?>
                                    <div class="flex justify-between">
                                        <span><?= htmlspecialchars($item['name']) ?> x<?= $item['quantity'] ?></span>
                                        <span class="font-bold"><?= number_format($item['total'], 2) ?>€</span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Riepilogo Spedizione -->
                    <div class="card bg-base-100 border-2 border-info">
                        <div class="card-body">
                            <h4 class="card-title text-lg mb-3">📍 Spedizione a</h4>
                            <?php $shipping = $_SESSION['checkout_shipping'] ?? []; ?>
                            <p class="font-semibold"><?= htmlspecialchars($shipping['name'] ?? '') ?></p>
                            <p><?= htmlspecialchars($shipping['address'] ?? '') ?></p>
                            <p><?= htmlspecialchars(($shipping['postal'] ?? '') . ' ' . ($shipping['city'] ?? '') . ' (' . ($shipping['country'] ?? '') . ')') ?></p>
                        </div>
                    </div>

                    <!-- Metodo Pagamento -->
                    <div class="card bg-base-100 border-2 border-warning">
                        <div class="card-body">
                            <h4 class="card-title text-lg mb-3">💳 Pagamento</h4>
                            <p class="font-semibold">
                                <?php 
                                $payment = $_SESSION['checkout_payment_method'] ?? '';
                                $labels = [
                                    'credit_card' => '💳 Carta di Credito',
                                    'paypal' => '🅿️ PayPal',
                                    'bank_transfer' => '🏦 Bonifico Bancario'
                                ];
                                echo $labels[$payment] ?? 'Non specificato';
                                ?>
                            </p>
                        </div>
                    </div>

                    <!-- Note Ordine -->
                    <form method="POST" class="space-y-4">
                        <input type="hidden" name="step" value="4">
                        
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Note Aggiuntive (opzionale)</span>
                            </label>
                            <textarea name="notes" placeholder="Istruzioni di consegna, note speciali..." class="textarea textarea-bordered" rows="4"></textarea>
                        </div>

                        <div class="alert alert-info">
                            <span>✓ Leggi attentamente i dati sopra. Una volta confermato, l'ordine non può essere annullato.</span>
                        </div>

                        <div class="flex gap-3">
                            <a href="/Gcyberware/public/checkout_advanced.php?step=3" class="btn btn-outline flex-1">
                                ← Indietro
                            </a>
                            <button type="submit" class="btn btn-success flex-1">
                                ✅ Conferma Ordine
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Riepilogo Totale -->
            <div>
                <div class="card bg-success text-success-content shadow-lg sticky top-6">
                    <div class="card-body">
                        <h3 class="card-title mb-4">💰 Totale Finale</h3>
                        <div class="divider my-2"></div>
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span>Subtotale:</span>
                                <span><?= number_format($total, 2) ?>€</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Spedizione:</span>
                                <span>Gratuita</span>
                            </div>
                        </div>
                        <div class="divider my-2"></div>
                        <div class="flex justify-between text-xl font-bold">
                            <span>TOTALE:</span>
                            <span><?= number_format($total, 2) ?>€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
