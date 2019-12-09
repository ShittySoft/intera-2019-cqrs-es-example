<?php

declare(strict_types=1);
namespace Ticket\Domain\DomainEvent;
use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

final class BetRemoved extends AggregateChanged
{
    public static function fromTicket(Uuid $ticket, string $name) : self
    {
        return self::occur($ticket->toString(), ['name' => $name]);
    }
    
    public function name() : string
    {
        return $this->payload['name'];
    }
}