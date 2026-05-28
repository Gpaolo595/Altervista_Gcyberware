<?php
require_once __DIR__ . "/../components/config/app.php";

require_role('admin');

$openTickets = BotTicket::getOpen();

include COMPONENTS_PATH . "/views/partials/navbar.php";
include COMPONENTS_PATH . "/views/admin/bot_tickets.php";
