<?php

declare(strict_types=1);

namespace Balance\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

class BalanceCreated extends AggregateChanged
{

    public static function forUser(UUid $balanceUuid, Uuid $user, int $amount = 0) :self
    {
        return self::occur($balanceUuid->toString(), ['user' => $user->toString(), 'amount' => $amount]);
    }

    public function amount() : int
    {
        return $this->payload['amount'];
    }

    public function user() : Uuid
    {
        return Uuid::fromString($this->payload['user']);
    }

}