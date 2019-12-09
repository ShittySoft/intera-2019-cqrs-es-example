<?php

declare(strict_types=1);

namespace Event\Domain\Value;

use Event\Domain\Value\EventId;
use Prooph\EventSourcing\AggregateChanged;

final class BettingEnabled extends AggregateChanged
{

    public static function forEvent(EventId $event)
    {
        return self::occur($event->toString());
    }

    public function event() : EventId
    {
        return EventId::fromString($this->aggregateId());
    }

}
