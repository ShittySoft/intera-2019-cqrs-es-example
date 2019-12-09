<?php

namespace Event\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Ramsey\Uuid\Uuid;
use Ticket\Domain\DomainEvent\BetRemoved;
use Ticket\Domain\DomainEvent\BetCanceled;

final class Ticket extends AggregateRoot
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

    public function cancelBet(string $name) {
        $this->recordThat(BetCanceled::onTicket($this->uuid, $name));
    }

    protected function whenBetRemoved(BetRemoved $event) {

    }

    protected function whenBetCanceled(BetCanceled $event) {

    }
}
