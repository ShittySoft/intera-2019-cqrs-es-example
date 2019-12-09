<?php

declare(strict_types=1);

namespace Event\Domain\Command;

use Event\Domain\Value\EventOdds;
use Prooph\Common\Messaging\Command;
use Event\Domain\Value\EventId;
use Event\Domain\Value\EventType;

final class StartEvent extends Command
{
    /**
     * @var \Event\Domain\Value\EventId
     */
    private $id;


    private function __construct(EventId $id)
    {
        $this->init();

        $this->id   = $id;
    }

    public static function fromFeedEntry(EventId $id) : self
    {
        return new self($id);
    }

    /**
     * @return EventId
     */
    public function id() : EventId
    {
        return $this->id;
    }

    protected function setPayload(array $payload) : void
    {
        $this->id   = EventId::fromString($payload['id']);
    }

    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'id'   => $this->id->toString(),
        ];
    }
}
