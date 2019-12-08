<?php

declare(strict_types=1);

namespace Roulette\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;

final class BettingStarted extends AggregateChanged
{
    public static function now(Uuid $round) : self
    {
        return self::occur($round->toString(), []);
    }
}