<?php

declare(strict_types=1);

namespace Event\Domain\Value;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/** @psalm-immutable */
final class EventId
{
    /** @var string */
    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function new() : self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public static function fromString(string $id) : self
    {
        return new self(Uuid::fromString($id)->toString());
    }

    public function toString() : string
    {
        return $this->id;
    }
}
