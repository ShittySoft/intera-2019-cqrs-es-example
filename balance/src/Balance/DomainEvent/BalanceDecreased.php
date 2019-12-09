<?php

declare(strict_types=1);

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

final class BalanceDecreased extends AggregateChanged
{
    public static function withAmount(Uuid $balance, int $amount): self
    {
        return self::occur($balance->toString(), ['amount' => $amount]);
    }

    public function amount() : int
    {
        return $this->payload['amount'];
    }
}
