<?php

declare(strict_types=1);

namespace Roulette\Domain\Command;

use Prooph\Common\Messaging\Command;
use Roulette\Domain\ReadModel;

final class CreateNewRound extends Command
{
    /** @var int */
    private $roundNumber;

    /** @var RouletteConfigInterface */
    private $rouletteConfig;

    private function __construct(int $roundNumber, RouletteConfigInterface $rouletteConfig)
    {
        $this->init();

        $this->roundNumber = $roundNumber;

        $this->rouletteConfig = $rouletteConfig;
    }

    public static function withNumber(int $roundNumber, RouletteConfigInterface $rouletteConfig) : self
    {
        return new self($roundNumber, $rouletteConfig);
    }

    public function roundNumber() : int
    {
        return $this->roundNumber;
    }

    public function rouletteConfig() : RouletteConfigInterface
    {
        return $this->rouletteConfig;
    }

    /** {@inheritDoc} */
    public function payload() : array
    {
        return [
            'roundNumber' => $this->roundNumber,
            'rouletteConfig' => $this->rouletteConfig,
        ];
    }

    /** {@inheritDoc} */
    protected function setPayload(array $payload)
    {
        $this->roundNumber = $payload['roundNumber'];
        $this->rouletteConfig = $payload['rouletteConfig'];
    }
}
