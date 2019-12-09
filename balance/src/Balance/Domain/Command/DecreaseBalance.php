<?php
declare(strict_types=1);

namespace Building\Domain\Command;

use Prooph\Common\Messaging\Command;
use Ramsey\Uuid\Uuid;

final class DecreaseBalance extends Command
{
    /** @var Uuid */
    private $balance;
    /** @var integer */
    private $amount;

    private function __construct(Uuid $balance, int $amount)
    {
        $this->init();
        $this->balance = $balance;
        $this->amount = $amount;
    }

    public static function withAmount(Uuid $balance, int $amount): self
    {
        return new self($balance, $amount);
    }

    public function balance(): Uuid
    {
        return $this->balance;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    /**  {@inheritDoc} */
    public function payload(): array
    {
        return [
            'balance' => $this->balance->toString(),
            'amount' => $this->amount,
        ];
    }

    /** {@inheritDoc} */
    protected function setPayload(array $payload): void
    {
        $this->balance = Uuid::fromString($payload['balance']);
        $this->amount = $payload['amount'];
    }
}
