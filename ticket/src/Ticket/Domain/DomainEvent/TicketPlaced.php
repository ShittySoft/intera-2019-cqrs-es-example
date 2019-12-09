<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\TicketAmount;

final class TicketPlaced extends AggregateChanged
{
    public static function withAmount(Uuid $ticket, TicketAmount $ticketAmount)
    {
<<<<<<< HEAD
        self::occur($ticket, ["amount" => $ticketAmount->amount(),
         "currency" => $ticketAmount->currency()]);
=======
        self::occur($ticket->toString(), ["amount" => $ticketAmount->amount(), "currency" => $ticketAmount->currency()]);
>>>>>>> b287d9855ede1fd0fe1137deaef90b6191534ee6
    }

    public function amount() : TicketAmount
    {
        return TicketAmount::withAmount($this->payload()["amount"]);
    }

}