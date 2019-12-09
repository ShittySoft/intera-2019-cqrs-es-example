<?php
declare(strict_types=1);
namespace Event\Domain\Value;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;
use Event\Domain\Value\EventId;

  final class EventCanceled extends AggregateChanged {

    public static function forEvent(EventId $event) {
      return self::occur($event->toString());
    }

    public function event() : EventId {
      return EventId::fromString($this->aggregateId());
    }

}
