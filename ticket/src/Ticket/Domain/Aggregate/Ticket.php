<?php

namespace Event\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\DomainEvent\BetRemoved;

final class Event extends AggregateRoot
{
    /**
     * @property Ramsey\Uuid\Uuid $uuid;
     * */
    private $uuid;

    public function aggregateId() : string
    {
        return $this->uuid->toString();
    }

    public function removeBet(string $name) {
        $this->recordThat(BetRemoved::fromTicket($this->uuid, $name));
    }

    protected function whenBetRemoved(BetRemoved $event) {
        
    }
}
