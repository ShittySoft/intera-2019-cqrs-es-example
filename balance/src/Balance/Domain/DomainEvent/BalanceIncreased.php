<?php

declare(strict_types=1);

namespace Balance\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;

final class BalanceIncreased extends AggregateChanged
{
    public static function withAmount(Uuid $balance, int $amount ) : self
    {
        return self::occur($balance->toString(), ['amount' => $amount]);
    }

    public function amount() : int
    {
        return $this->payload['amount'];
    }
}
