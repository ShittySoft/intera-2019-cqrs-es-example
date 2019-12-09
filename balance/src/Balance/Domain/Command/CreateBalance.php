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
    private $user;
    /** @var integer */
    private $amount;

    private function __construct(Uuid $balance, Uuid $user, int $amount = 0)
    {
        $this->init();
        $this->balance = $balance;
        $this->user = $user;
        $this->amount = $amount;
    }
    public static function forUser(Uuid $balance, Uuid $user, int $amount) : self
    {
        return new self($balance, $user, $amount);
    }
    public function balance() : Uuid
    {
        return $this->balance;
    }
    public function amount() : int
    {
        return $this->amount;
    }

    public function user() : Uuid
    {
        return $this->user;
    }
    /**
     * {@inheritDoc}
     */
    public function payload() : array
    {
        return [
            'balance' => $this->balance->toString(),
            'user' => $this->user,
            'amount' => $this->amount,
        ];
    }
    /**
     * {@inheritDoc}
     */
    protected function setPayload(array $payload) : void
    {
        $this->balance = Uuid::fromString($payload['balance']);
        $this->user = $payload['user'];
        $this->amount = $payload['amount'];

    }

}