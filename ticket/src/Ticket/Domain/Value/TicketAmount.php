<?php


namespace Ticket\Domain\Value;


use \InvalidArgumentException;

class TicketAmount
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
    public function __construct(int $amount)
    {
        if($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive integer");
        }

        $this->amount = $amount;
    }

    public function toArray(): array
    {
        return [
            "amount" => $this->amount,
            "currency" => $this->currency
        ];
    }

    public static function fromArray(array $ticketAmountArray): self
    {
        return new self($ticketAmountArray["amount"]);
    }
}