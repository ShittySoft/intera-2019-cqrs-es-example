<?php

declare(strict_types=1);

namespace Event\Domain\Value;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/** @psalm-immutable */
final class EventId
{
    /** @var UuidInterface */
    private $id;

    private function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public static function new() : self
    {
        return new self(Uuid::uuid4());
    }

    public static function fromString(string $id) : self
    {
        return new self(Uuid::fromString($id));
    }

    public function toString() : string
    {
        return $this->id->toString();
    }
}
