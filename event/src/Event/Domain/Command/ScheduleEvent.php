<?php

declare(strict_types=1);

namespace Event\Domain\Command;

use Event\Domain\Value\EventOdds;
use Prooph\Common\Messaging\Command;
use Event\Domain\Value\EventId;
use Event\Domain\Value\EventType;

final class ScheduleEvent extends Command
{
    /**
     * @var \Event\Domain\Value\EventId
     */
    private $id;

    /**
     * @var \Event\Domain\Value\EventType
     */
    private $type;

    /**
     * @var EventOdds
     */
    private $odds;

    private function __construct(EventId $id, EventType $type, EventOdds $odds)
    {
        $this->init();

        $this->id   = $id;
        $this->type = $type;
        $this->odds = $odds;
    }

    public static function fromFeedEntry(EventId $id, EventType $type, EventOdds $odds) : self
    {
        return new self($id, $type, $odds);
    }

    /**
     * @return EventId
     */
    public function id() : EventId
    {
        return $this->id;
    }

    /**
     * @return EventType
     */
    public function type() : EventType
    {
        return $this->type;
    }

    public function odds() : EventOdds
    {
        return $this->odds;
    }

    protected function setPayload(array $payload) : void
    {
        $this->id   = EventId::fromString($payload['id']);
        $this->type = EventType::create($payload['type']);
        $this->odds = EventOdds::fromExternalEventResult($payload['odds']);
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id'   => $this->id->toString(),
            'type' => $this->type->toString(),
            'odds' => $this->odds->toArray(),
        ];
    }
}
