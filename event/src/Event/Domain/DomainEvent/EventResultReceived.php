<?php

declare(strict_types=1);

namespace Event\Domain\DomainEvent;

use Event\Domain\Value\EventId;
use Event\Domain\Value\EventResult;
use Prooph\EventSourcing\AggregateChanged;

final class EventResultReceived extends AggregateChanged
{
    public static function forEvent(
        EventId $event,
        EventResult $result
    ) : self {
        return self::occur($event->toString(), ['result' => $result->toArray()]);
    }

    public function event() : EventId
    {
        return EventId::fromString($this->aggregateId());
    }

    public function result() : EventResult
    {
        return EventResult::fromExternalEventResult($this->payload()['result']);
    }
}
