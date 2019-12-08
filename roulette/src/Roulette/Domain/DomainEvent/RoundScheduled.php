<?php

declare(strict_types=1);

namespace Roulette\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;

final class RoundScheduled extends AggregateChanged
{
    public static function withNumber(Uuid $round, int $roundNumber) : self
    {
        return self::occur($round->toString(), ['roundNumber' => $roundNumber]);
    }

    public function roundNumber() : int
    {
        return $this->payload['roundNumber'];
    }
}