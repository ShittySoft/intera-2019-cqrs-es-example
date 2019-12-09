<?php

use Prooph\Common\Messaging\Command;

use Event\Domain\Value\EventId;
use Event\Domain\Value\EventType;
use Event\Domain\Value\EventResult;


final class RegisterEventResult extends Command
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
     * @var \Event\Domain\Value\EventResult
     */
    private $result;

    private function __construct(EventId $id, EventType $type, EventResult $result)
    {
        $this->init();

        $this->id = $id;
        $this->type = $type;
        $this->result = $result;
    }

    public static function fromFeedEntry(EventId $id, EventType $type, EventResult $result) : self
    {
        return new self($id, $type, $result);
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
        $this->result = EventResult::fromExternalEventResult($payload['result']);
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id' => $this->id->toString(),
            'type' => $this->type->toString(),
            'result' => $this->result->toArray(),
        ];
    }
}
