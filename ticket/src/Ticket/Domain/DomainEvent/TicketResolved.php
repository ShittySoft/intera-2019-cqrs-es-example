<?php

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\TicketAmount;

final class TicketResolved extends AggregateChanged
{
    public static function withTicket(Uuid $ticket)
    {
        self::occur($ticket);
    }
}