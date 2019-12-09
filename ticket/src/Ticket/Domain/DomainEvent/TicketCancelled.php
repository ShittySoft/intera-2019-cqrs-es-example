<?php

declare(strict_types=1);

namespace Ticket\Domain\DomainEvent;

use Event\Domain\Aggregate\Ticket;
use Prooph\EventSourcing\AggregateChanged;

final class TicketCancelled extends AggregateChanged
{
    public static function removeTicket(Ticket $ticket) : self
    {
        return self::occur($ticket->aggregateId());
    }
}
