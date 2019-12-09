<?php

namespace Event\Domain\Aggregate;

use Balance\Domain\DomainEvent\BalanceCreated;
use Balance\Domain\DomainEvent\BalanceIncreased;
use Building\Domain\DomainEvent\NewBuildingWasRegistered;
use Event\Domain\DomainEvent\BalanceDecreased;
use Event\Domain\DomainEvent\MoneyTransferedOut;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Ramsey\Uuid\Uuid;

final class Balance extends AggregateRoot
{
    /** @var Uuid */
    public $balance;

    /** @var Uuid */
    public $user;

    /** @var int */
    public $amount;

    public static function create(Uuid $user) : self
    {
        $self = new self();

        $self->recordThat(BalanceCreated::forUser(
            UUid::uuid4(),
            $user
        ));

        return $self;
    }

    public function increaseBalance(int $amount) : void
    {
        //TODO
    }

    public function decreaseBalance(int $amount) : void
    {
        //TODO
    }

    public function moneyTransferOut(int $amount) : void
    {
        //TODO
    }

    protected function whenNewBalanceWasCreated(BalanceCreated $balance) : void
    {
        $this->balance = Uuid::fromString($balance->aggregateId());
        $this->user = $balance->user();
        $this->amount = $balance->amount();
    }

    protected function whenIncreaseBalance(BalanceIncreased $balance) : void
    {
        //TODO
    }

    protected function whenDecreaseBalance(BalanceDecreased $balance) : void
    {
        //TODO
    }

    protected function whenMoneyTransferOut(MoneyTransferedOut $balance) : void
    {
        //TODO
    }


    public function aggregateId() : string
    {
        throw new \BadFunctionCallException('Not implemented');
    }

    protected function apply(AggregateChanged $event) : void
    {
        throw new \BadFunctionCallException('Not implemented');
    }
}
