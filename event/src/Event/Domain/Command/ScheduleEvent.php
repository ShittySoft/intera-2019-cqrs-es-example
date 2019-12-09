<?php

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


    private function __construct(EventId $id, EventType $type)
    {
        $this->init();

        $this->id = $id;
        $this->type = $type;
    }

    public static function fromFeedEntry(EventId $id, EventType $type) : self
    {
        return new self($id, $type);
    }

    /**
     * @return EventId
     */
    public function id(): EventId
    {
        return $this->id;
    }

    /**
     * @return EventType
     */
    public function type(): EventType
    {
        return $this->type;
    }



    protected function setPayload(array $payload): void
    {
        /**
         * @var EventType
         */
        $eventType = EventType::create($payload['type']);

        $this->id = EventId::fromString($payload['id']);
        $this->type = $eventType;
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id' => $this->id->toString(),
            'type' => $this->type->toString(),
        ];
    }
}