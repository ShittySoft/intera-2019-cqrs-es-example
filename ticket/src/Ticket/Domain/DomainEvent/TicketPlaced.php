<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\TicketAmount;

final class TicketPlaced extends AggregateChanged
{
    public static function withAmount(Uuid $ticket, TicketAmount $amount)
    {
        self::occur($ticket, ["amount" => $amount->toArray()]);
    }

    public function amount() : string
    {
        return $this->payload['amount'];
    }

}