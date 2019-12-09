<?php

declare(strict_types=1);

namespace Ticket\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\Value\Odd;

class BetPlaced extends AggregateChanged
{
    public static function toTicket(Uuid $ticket, string $name, Odd $odd) : self
    {
        return self::occur($ticket->toString(), ['name' => $name, 'odd' => $odd->odd()]);
    }

    public function name(): string {
        return $this->payload['name'];
    }

    public function odd() : Odd {
        return Odd::fromInternalEventOdd($this->payload()['odd']);
    }
}