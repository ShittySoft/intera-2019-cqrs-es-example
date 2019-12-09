<?php

namespace Roulette\Domain\Aggregate;

use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Roulette\Domain\ReadModel\RouletteConfigInterface;
use Roulette\Domain\ReadModel\RoundConfigInterface;
use Webmozart\Assert\Assert;

final class Round extends AggregateRoot
{
    /** @var Uuid */
    private $uuid;

    /** @var string */
    private $roundNumber;

    /** @var RoundConfigInterface */
    private $roundConfig;

    /** @var int */
    private $state;

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

    public function startRound() : void
    {
        Assert::eq($this->state, 0, "Current state is not Scheduled");

        $this->recordThat(RoundStarted::now($this->uuid));
    }

    public function startBetting() : void
    {
        Assert::eq($this->state, 1, "Current state is not Started");

        $this->recordThat(BettingStarted::now($this->uuid));
    }

    protected function apply(AggregateChanged $event) : void
    {
        if ($event instanceof RoundScheduled) {
            $this->uuid = Uuid::fromString($event->aggregateId());
            $this->roundNumber = $event->roundNumber();
            $this->state = 0; //Scheduled
            //TODO: create RoundConfig from RouletteConfig
            //$this->roundConfig = $event->rouletteConfig();
            return;
        }
        if ($event instanceof RoundStarted) {
            $this->state = 1; //Started
            return;
        }
        if ($event instanceof BettingStarted) {
            $this->state = 2; //Betting
            return;
        }
        throw new \UnexpectedValueException(sprintf('Unknown event type "%s"', get_class($event)));
    }

}
