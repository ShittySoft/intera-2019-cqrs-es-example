<?php

declare(strict_types=1);

namespace Event\Domain\DomainEvent;

use Event\Domain\Value\EventId;
use Prooph\EventSourcing\AggregateChanged;

final class EventResultInvalidated extends AggregateChanged
{
    public static function forEvent(EventId $event) : self
    {
        return self::occur($event->toString());
    }

    public function event() : EventId
    {
        return EventId::fromString($this->aggregateId());
    }
}
