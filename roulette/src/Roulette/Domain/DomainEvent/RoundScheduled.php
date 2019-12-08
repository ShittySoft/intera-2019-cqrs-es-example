<?php

declare(strict_types=1);

namespace Roulette\Domain\DomainEvent;

use Prooph\EventSourcing\AggregateChanged;
use Rhumsaa\Uuid\Uuid;

final class RoundScheduled extends AggregateChanged
{
    public static function withNumber(Uuid $round, int $roundNumber, RouletteConfigInterface $rouletteConfig) : self
    {
        return self::occur($round->toString(), ['roundNumber' => $roundNumber, 'rouletteConfig' => $rouletteConfig]);
    }

    public function roundNumber() : int
    {
        return $this->payload['roundNumber'];
    }

    public function rouletteConfig() : RouletteConfigInterface
    {
        return $this->payload['rouletteConfig'];
    }
}