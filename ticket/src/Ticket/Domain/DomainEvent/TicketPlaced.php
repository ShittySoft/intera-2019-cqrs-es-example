<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

class TicketPlaced extends AggregateChanged
{
    public static function withAmount(Uuid $ticket, float $amount)
    {
        self::occur($ticket, ["amount" => $amount]);
    }

    public function amount() : string
    {
        return $this->payload['amount'];
    }

}