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
     * @var \Event\Domain\Value\EventResult
     */
    private $result;

    private function __construct(EventId $id, EventResult $result)
    {
        $this->init();

        $this->id = $id;
        $this->result = $result;
    }

    public static function fromFeedEntry(EventId $id, EventResult $result) : self
    {
        return new self($id, $result);
    }

    /**
     * @return EventId
     */
    public function id(): EventId
    {
        return $this->id;
    }

    protected function setPayload(array $payload): void
    {
        $this->id = EventId::fromString($payload['id']);
        $this->result = EventResult::fromExternalEventResult($payload['result']);
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id' => $this->id->toString(),
            'result' => $this->result->toArray(),
        ];
    }
}
