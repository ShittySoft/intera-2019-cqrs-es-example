<?php


namespace Ticket\Domain\Value;

use \InvalidArgumentException;
use Webmozart\Assert\Assert;

final class TicketAmount
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $currency = "USD";

    /**
     * TicketAmount constructor.
     */
    private function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $amount
     * @return static
     */
    public static function withAmount(int $amount): self
    {
        Assert::integer($amount);

        if($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive integer");
        }

        return new self($amount);
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function currency(): string
    {
        return $this->currency;
    }


}