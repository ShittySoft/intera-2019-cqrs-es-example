<?php

namespace Event\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;

class MoneyTransferedOut extends AggregateChanged
{

    public static function ofBalance(Uuid $balance, int $amount): self
    {
        return self::occur($balance->toString(), ['amount' => $amount]);
    }

    public function amount(): int
    {
        return $this->payload['amount'];
    }

}