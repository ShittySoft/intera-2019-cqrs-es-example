<?php

namespace Event\Domain\Command;

use Prooph\Common\Messaging\Command;
use Ramsey\Uuid\Uuid;

class TransferMoneyOut extends Command
{
    /** @var Uuid */
    private $balance;

    /** @var int */
    private $amount;

    /**
     * TransferMoneyOut constructor.
     * @param Uuid $balance
     * @param int $amount
     */
    public function __construct(Uuid $balance, int $amount)
    {
        $this->balance = $balance;
        $this->amount = $amount;
    }

    public static function ofBalance(Uuid $balance, int $amount) :self
    {
        return new self($balance, $amount);
    }

    /**
     * @return Uuid
     */
    public function balance(): Uuid
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    public function payload(): array
    {
        return [
            'balance' => $this->balance,
            'amount' => $this->amount
        ];
    }

    protected function setPayload(array $payload): void
    {
        $this->balance = Uuid::fromString($payload['balance']);
        $this->amount = (int) $payload['amount'];
    }
}