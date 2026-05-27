<?php

require_once COMPONENTS_PATH . "/models/Ticket.php";
require_once COMPONENTS_PATH . "/models/User.php";

class OperatorController {

    public static function listTickets() {
        return Ticket::allOpen();
    }
    
    public static function countOpenTickets() {
    return Ticket::countOpen();
    }


    public static function getTicket($id) {
        return Ticket::find($id);
    }

    public static function addResponse($ticket_id, $operator_id, $response) {
        return Ticket::addResponse($ticket_id, $operator_id, $response);
    }

    public static function closeTicket($id) {
        return Ticket::close($id);
    }
}
