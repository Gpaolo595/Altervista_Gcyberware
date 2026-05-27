<?php
// Avvia la sessione
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Debug attivo (sviluppo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definizione percorsi globali
define("BASE_PATH", dirname(__DIR__, 2));
define("COMPONENTS_PATH", BASE_PATH . "/components");
define("PUBLIC_PATH", BASE_PATH . "/public");

// Configurazioni
require_once COMPONENTS_PATH . "/config/db.php";

// Librerie core
require_once COMPONENTS_PATH . "/lib/auth.php";
require_once COMPONENTS_PATH . "/lib/chat_history.php";
require_once COMPONENTS_PATH . "/lib/classifier.php";
require_once COMPONENTS_PATH . "/lib/groq_client.php";
require_once COMPONENTS_PATH . "/lib/product_search.php";

// Modelli principali
require_once COMPONENTS_PATH . "/models/User.php";
require_once COMPONENTS_PATH . "/models/Product.php";
require_once COMPONENTS_PATH . "/models/Category.php";
require_once COMPONENTS_PATH . "/models/Ticket.php";
require_once COMPONENTS_PATH . "/models/Order.php";
require_once COMPONENTS_PATH . "/models/OrderItem.php";
require_once COMPONENTS_PATH . "/models/Review.php";

// Controller
require_once COMPONENTS_PATH . "/controllers/AuthController.php";
require_once COMPONENTS_PATH . "/controllers/ProductController.php";
require_once COMPONENTS_PATH . "/controllers/CategoryController.php";
require_once COMPONENTS_PATH . "/controllers/AdminController.php";
require_once COMPONENTS_PATH . "/controllers/OperatorController.php";
require_once COMPONENTS_PATH . "/controllers/UserDashboardController.php";
require_once COMPONENTS_PATH . "/controllers/CartController.php";
require_once COMPONENTS_PATH . "/controllers/OrderController.php";
require_once COMPONENTS_PATH . "/controllers/ReviewController.php";
