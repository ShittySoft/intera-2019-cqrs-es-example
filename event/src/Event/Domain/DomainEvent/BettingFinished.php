<?php

declare(strict_types=1);

namespace Event\Domain\DomainEvent;

use Event\Domain\Value\EventId;
use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

class BettingFinished extends AggregateChanged
{
    public static function forEvent(Uuid $event) : self
    {
        return self::occur($event->toString());
    }

    public function event() : EventId
    {
        return EventId::fromString($this->aggregateId());
    }
}