<?php

declare(strict_types=1);

namespace Roulette\Domain\Command;

use Prooph\Common\Messaging\Command;

final class CreateNewRound extends Command
{
    /** @var int */
    private $roundNumber;

    private function __construct(int $roundNumber)
    {
        $this->init();

        $this->roundNumber = $roundNumber;
    }

    public static function withNumber(int $roundNumber) : self
    {
        return new self($roundNumber);
    }

    public function roundNumber() : int
    {
        return $this->roundNumber;
    }

    /** {@inheritDoc} */
    public function payload() : array
    {
        return [
            'roundNumber' => $this->roundNumber,
        ];
    }

    /** {@inheritDoc} */
    protected function setPayload(array $payload)
    {
        $this->roundNumber = $payload['roundNumber'];
    }
}
