<?php

namespace Voucher\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;

final class Round extends AggregateRoot
{

    /** @var Uuid */
    private $uuid;

    /** @var string */
    private $roundNumber;


    public static function new(int $roundNumber) : self
    {
        $self = new self();

        $self->recordThat(RoundScheduled::withNumber(Uuid::uuid4(), $roundNumber));

        return $self;
    }
    public function aggregateId() : string
    {
        return $this->uuid->toString();
    }

    protected function whenRoundScheduled(RoundScheduled $event)
    {
        $this->uuid = Uuid::fromString($event->aggregateId());
        $this->roundNumber = $event->roundNumber();
    }

    public function startRound() : void
    {
        $this->recordThat(RoundStarted::now($this->uuid));
    }

}
