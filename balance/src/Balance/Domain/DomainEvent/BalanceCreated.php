<?php

declare(strict_types=1);

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

class BalanceCreated extends AggregateChanged
{

    public static function forUser(UUid $balanceUuid, Uuid $userId, int $amount = 0) :self
    {
        return self::occur($balanceUuid->toString(), ['user' => $userId->toString(), 'amount' => $amount]);
    }

    public function balance() : int
    {
        return $this->payload['balance'];
    }

    public function userid() : Uuid
    {
        return Uuid::fromString($this->payload['user']);
    }

}