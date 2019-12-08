<?php

namespace Roulette\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Roulette\Domain\ReadModel\RouletteConfigInterface;
use Roulette\Domain\ReadModel\RoundConfigInterface;

final class Round extends AggregateRoot
{

    /** @var Uuid */
    private $uuid;

    /** @var string */
    private $roundNumber;

    /** @var RoundConfigInterface */
    private $roundConfig;



    public static function new(int $roundNumber, RouletteConfigInterface $rouletteConfig) : self
    {
        $self = new self();

        $self->recordThat(RoundScheduled::withNumber(Uuid::uuid4(), $roundNumber, $rouletteConfig));

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

        //TODO: create RoundConfig from RouletteConfig
        //$this->roundConfig = $event->rouletteConfig();
    }

    public function startRound() : void
    {
        $this->recordThat(RoundStarted::now($this->uuid));
    }

    protected function whenRoundStarted(RoundStarted $event)
    {
        $this->uuid = Uuid::fromString($event->aggregateId());
    }

    public function startBetting() : void
    {
        $this->recordThat(BettingStarted::now($this->uuid));
    }

    protected function whenBettingStarted(BettingStarted $event)
    {
        $this->uuid = Uuid::fromString($event->aggregateId());
    }

}
