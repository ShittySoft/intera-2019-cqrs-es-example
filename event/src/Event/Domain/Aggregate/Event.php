<?php

namespace Event\Domain\Aggregate;

use Event\Domain\Command\DelayEvent;
use Event\Domain\Command\DisableBetting;
use Event\Domain\Command\EnableBetting;
use Event\Domain\Command\ScheduleEvent;
use Event\Domain\Command\StartEvent;
use Event\Domain\DomainEvent\EventScheduled;
use Event\Domain\DomainEvent\OddsCreated;
use Event\Domain\Value\BettingDisabled;
use Event\Domain\Value\BettingEnabled;
use Event\Domain\Value\EventDelayed;
use Event\Domain\Value\EventId;
use Event\Domain\Value\EventStarted;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Webmozart\Assert\Assert;

final class Event extends AggregateRoot
{
    /** @var EventId */
    private $id;

    /** @var bool */
    private $bettingEnabled = true;

    public function schedule(ScheduleEvent $schedule) : self
    {
        $instance = new self();

        $this->recordThat(EventScheduled::forType(
            $schedule->id(),
            $schedule->type()
        ));

        $this->recordThat(OddsCreated::forEvent(
            $schedule->id(),
            $schedule->odds()
        ));

        return $instance;
    }

    public function enableBetting(EnableBetting $enableBetting) : void
    {
        Assert::false($this->bettingEnabled);

        $this->recordThat(BettingEnabled::forEvent($this->id));
    }

    public function disableBetting(DisableBetting $disable) : void
    {
        Assert::true($this->bettingEnabled);

        $this->recordThat(BettingDisabled::forEvent($this->id));
    }

    public function startEvent(StartEvent $start) : void
    {
        $this->recordThat(EventStarted::forEvent($this->id));
    }


    public function delayEvent(DelayEvent $delay) : void
    {
        $this->recordThat(EventDelayed::forEvent($this->id));
    }

    public function aggregateId() : string
    {
        return $this->id->toString();
    }

    protected function apply(AggregateChanged $event) : void
    {
        if ($event instanceof BettingEnabled) {
            $this->bettingEnabled = true;

            return;
        }

        if ($event instanceof BettingDisabled) {
            $this->bettingEnabled = false;

            return;
        }

        throw new \UnexpectedValueException(sprintf('Unknown event type "%s"', get_class($event)));
    }
}
