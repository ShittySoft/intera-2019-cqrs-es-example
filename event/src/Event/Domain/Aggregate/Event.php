<?php

namespace Event\Domain\Aggregate;

use Event\Domain\Command\DisableBetting;
use Event\Domain\Command\EnableBetting;
use Event\Domain\Command\ScheduleEvent;
use Event\Domain\Value\BettingDisabled;
use Event\Domain\Value\BettingEnabled;
use Event\Domain\Value\EventId;
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

        // @TODO "events scheduled" and "odds created" needed here

        throw new \BadFunctionCallException('"events scheduled" and "odds created" needed here');

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
