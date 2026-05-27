<?php $user = current_user(); ?>

<nav class="navbar bg-base-100 px-6 shadow mb-6">
    <div class="flex-1">
        <a href="/Gcyberware/public/index.php" class="btn btn-ghost text-lg">Home</a>
    </div>

    <div class="flex gap-3">

        <?php if ($user): ?>

            <a href="/Gcyberware/public/dashboard.php" class="btn btn-sm btn-primary">Dashboard</a>
            <a href="/Gcyberware/public/shop.php">Shop</a>
            <a href="/Gcyberware/public/cart.php">🛒 Carrello
            <a href="/Gcyberware/public/orders.php">I miei ordini</a>


            <?php if ($user['role'] === 'admin'): ?>
                <a href="/Gcyberware/public/admin.php" class="btn btn-sm btn-secondary">Admin</a>
                <a href="/Gcyberware/public/categories.php" class="btn btn-sm btn-accent">Categorie</a>
                <a href="/Gcyberware/public/admin_reviews.php" class="btn btn-sm btn-accent">⭐ Recensioni</a>
            <?php endif; ?>

            <?php if ($user['role'] === 'operator' || $user['role'] === 'admin'): ?>

                <?php 
                    require_once COMPONENTS_PATH . "/controllers/OperatorController.php";
                    $count = OperatorController::countOpenTickets();
                ?>

                <a href="/Gcyberware/public/operator.php" class="btn btn-sm btn-warning">
                    Ticket
                    <?php if ($count > 0): ?>
                        <span class="badge badge-error ml-2"><?= $count ?></span>
                    <?php endif; ?>
                </a>

            <?php endif; ?>

            <a href="/Gcyberware/public/logout.php" class="btn btn-sm btn-outline">Logout</a>

        <?php else: ?>

            <a href="/Gcyberware/public/login.php" class="btn btn-sm btn-primary">Login</a>
            <a href="/Gcyberware/public/register.php" class="btn btn-sm btn-outline">Registrati</a>

        <?php endif; ?>

    </div>

</nav>
