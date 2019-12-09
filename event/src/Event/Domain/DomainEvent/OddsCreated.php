<?php

declare(strict_types=1);

namespace Event\Domain\DomainEvent;

use Event\Domain\Value\EventId;
use Event\Domain\Value\EventOdds;
use Event\Domain\Value\EventType;
use Prooph\EventSourcing\AggregateChanged;

final class OddsCreated extends AggregateChanged
{
    private const PK_ODDS = "odds";

    public static function forEvent(EventId $id, EventOdds $odds) {
        return self::occur($id->toString(), [self::PK_ODDS => $odds->toArray()]);
    }

    public function id() : EventId {
        return EventId::fromString($this->aggregateId());
    }

    public function type() : EventType {
        return EventType::create($this->payload['type']);
    }

    public function odds() : EventOdds
    {
        return EventOdds::fromExternalEventResult($this->payload()[self::PK_ODDS]);
    }

}
