<?php
require_once __DIR__ . "/../components/config/app.php";
require_once COMPONENTS_PATH . "/models/Order.php";
require_once COMPONENTS_PATH . "/models/OrderItem.php";
require_once COMPONENTS_PATH . "/models/Product.php";

$user = current_user();
if (!$user) {
    header("Location: /Gcyberware/public/login.php");
    exit;
}

// Ottenere il carrello e verificare che sia pieno
$cart = CartController::getCart();
if (empty($cart)) {
    header("Location: /Gcyberware/public/cart.php");
    exit;
}

// Step dalla sessione o da GET
$step = intval($_GET['step'] ?? 1);
if ($step < 1 || $step > 4) $step = 1;

// Calcolare totale carrello
$total = 0;
$cart_items = [];
foreach ($cart as $product_id => $qty) {
    $product = Product::find($product_id);
    if ($product) {
        $item_total = $product['price'] * $qty;
        $total += $item_total;
        $cart_items[] = [
            'id' => $product_id,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $qty,
            'total' => $item_total
        ];
    }
}

// Gestire POST per creare/aggiornare ordine
$order_id = null;
$order = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $step = intval($_POST['step'] ?? 1);

    if ($step == 1) {
        // STEP 1: Crea ordine preliminare
        $order_id = Order::create($user['id'], $total);
        
        // Aggiungere item all'ordine
        foreach ($cart_items as $item) {
            OrderItem::add($order_id, $item['id'], $item['quantity'], $item['price']);
        }
        
        $_SESSION['checkout_order_id'] = $order_id;
        header("Location: /Gcyberware/public/checkout_advanced.php?step=2");
        exit;

    } elseif ($step == 2) {
        // STEP 2: Dati spedizione
        $order_id = $_SESSION['checkout_order_id'] ?? null;
        if (!$order_id) {
            $error = "Sessione scaduta. Ricominciare.";
        } else {
            // Validare campi spedizione
            $name = trim($_POST['shipping_name'] ?? '');
            $address = trim($_POST['shipping_address'] ?? '');
            $city = trim($_POST['shipping_city'] ?? '');
            $postal = trim($_POST['shipping_postal'] ?? '');
            $country = trim($_POST['shipping_country'] ?? '');

            if (empty($name) || empty($address) || empty($city) || empty($postal) || empty($country)) {
                $error = "Tutti i campi di spedizione sono obbligatori.";
                $step = 2;
            } else {
                // Salvare nella sessione
                $_SESSION['checkout_shipping'] = compact('name', 'address', 'city', 'postal', 'country');
                header("Location: /Gcyberware/public/checkout_advanced.php?step=3");
                exit;
            }
        }

    } elseif ($step == 3) {
        // STEP 3: Pagamento
        $order_id = $_SESSION['checkout_order_id'] ?? null;
        $payment_method = trim($_POST['payment_method'] ?? '');
        
        if (empty($payment_method)) {
            $error = "Scegliere un metodo di pagamento.";
            $step = 3;
        } else {
            $_SESSION['checkout_payment_method'] = $payment_method;
            header("Location: /Gcyberware/public/checkout_advanced.php?step=4");
            exit;
        }

    } elseif ($step == 4) {
        // STEP 4: Conferma finale
        $order_id = $_SESSION['checkout_order_id'] ?? null;
        $shipping = $_SESSION['checkout_shipping'] ?? null;
        $payment_method = $_SESSION['checkout_payment_method'] ?? null;
        $notes = trim($_POST['notes'] ?? '');

        if (!$order_id || !$shipping || !$payment_method) {
            $error = "Dati incompleti. Ricominciare dal STEP 1.";
            $step = 1;
        } else {
            // Aggiornare ordine con dati finali
            Order::updateShippingAndPayment($order_id, $shipping, $payment_method, $notes);
            
            // Pulire sessione
            CartController::clear();
            unset($_SESSION['checkout_order_id']);
            unset($_SESSION['checkout_shipping']);
            unset($_SESSION['checkout_payment_method']);

            // Redirect a ordine confermato
            header("Location: /Gcyberware/public/order_view.php?id=$order_id&confirmed=1");
            exit;
        }
    }
}

// Ottenere ordine dalla sessione se step >= 2
if ($step >= 2) {
    $order_id = $_SESSION['checkout_order_id'] ?? null;
    if ($order_id) {
        $order = Order::find($order_id);
    }
}

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/checkout/advanced.php";
