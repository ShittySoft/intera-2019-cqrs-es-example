<?php

namespace Event\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

final class Balance extends AggregateRoot
{
    public function aggregateId() : string
    {
        throw new \BadFunctionCallException('Not implemented');
    }

    protected function apply(AggregateChanged $event) : void
    {
        throw new \BadFunctionCallException('Not implemented');
    }
}
