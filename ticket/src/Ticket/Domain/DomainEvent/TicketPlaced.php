<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\TicketAmount;

final class TicketPlaced extends AggregateChanged
{
    public static function withAmount(Uuid $ticket, TicketAmount $ticketAmount)
    {
        self::occur($ticket->toString(), ["amount" => $ticketAmount->amount(), "currency" => $ticketAmount->currency()]);
    }

    public function amount() : TicketAmount
    {
        return TicketAmount::withAmount($this->payload()["amount"]);
    }

}