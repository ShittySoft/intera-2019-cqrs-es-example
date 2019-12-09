<?php

declare(strict_types=1);

namespace Balance\Domain\Command;

use Prooph\Common\Messaging\Command;
use Ramsey\Uuid\Uuid;

final class CreateBalance extends Command
{
    /** @var Uuid */
    private $balance;
    /** @var Uuid */
    private $userId;
    /** @var integer */
    private $amount;

    private function __construct(Uuid $balance, Uuid $userId, int $amount = 0)
    {
        $this->init();
        $this->balance = $balance;
        $this->userId = $userId;
        $this->amount = $amount;
    }
    public static function forUser(Uuid $balance, Uuid $userId, int $amount) : self
    {
        return new self($balance, $userId, $amount);
    }
    public function balance() : Uuid
    {
        return $this->balance;
    }
    public function amount() : int
    {
        return $this->amount;
    }

    public function userId() : Uuid
    {
        return $this->userId;
    }
    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'balance' => $this->balance->toString(),
            'userId' => $this->userId,
            'amount' => $this->amount,
        ];
    }
    /**
     * {@inheritDoc}
     */
    protected function setPayload(array $payload) : void
    {
        $this->balance = Uuid::fromString($payload['balance']);
        $this->userId = $payload['userId'];
        $this->amount = $payload['amount'];

    }

}