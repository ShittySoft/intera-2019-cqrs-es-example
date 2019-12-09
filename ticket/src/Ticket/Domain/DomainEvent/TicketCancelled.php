<?php

declare(strict_types=1);

namespace Ticket\Domain\DomainEvent;

use Event\Domain\Aggregate\Ticket;
use Prooph\EventSourcing\AggregateChanged;

final class TicketCancelled extends AggregateChanged
{
    public static function removeTicket(Ticket $ticket, string $username) : self
    {
        return self::occur($ticket->aggregateId(), ['username' => $username]);
    }

    public function username() : string
    {
        return $this->payload['username'];
    }
}
