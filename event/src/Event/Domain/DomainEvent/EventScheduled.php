<?php

declare(strict_types=1);

namespace Event\Domain\DomainEvent;

use Event\Domain\Value\EventId;
use Event\Domain\Value\EventType;
use Prooph\EventSourcing\AggregateChanged;

final class EventScheduled extends AggregateChanged
{
    public static function forType(EventId $id, EventType $type) {
        return self::occur($id->toString(), ['type' => $type->toString()]);
    }

    public function id() : EventId {
        return EventId::fromString($this->aggregateId());
    }

    public function type() : EventType {
        return EventType::create($this->payload['type']);
    }

}
