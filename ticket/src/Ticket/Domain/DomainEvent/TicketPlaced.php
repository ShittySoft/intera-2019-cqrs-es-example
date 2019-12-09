<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\TicketAmount;

final class TicketPlaced extends AggregateChanged
{
    public static function withAmount(Uuid $ticket, TicketAmount $ticketAmount)
    {
        self::occur($ticket, ["amount" => $ticketAmount->amount(),
         "currency" => $ticketAmount->currency()]);
    }

    public function amount() : string
    {
        return $this->payload['amount'];
    }

}