<?php

declare(strict_types=1);

namespace Event\Domain\Command;

use Event\Domain\Value\EventId;
use Prooph\Common\Messaging\Command;
use Rhumsaa\Uuid\Uuid;

final class DisableBetting extends Command
{
    /** @var EventId */
    private $id;

    private function __construct(EventId $id)
    {
        $this->id = $id;

        $this->init();
    }

    public static function forEvent(EventId $id) : self
    {
        return new self($id);
    }

    protected function setPayload(array $payload) : void
    {
        $this->id = EventId::fromString($payload['id']);
    }

    public function payload() : array
    {
        return ['id' => $this->id->toString()];
    }
}
