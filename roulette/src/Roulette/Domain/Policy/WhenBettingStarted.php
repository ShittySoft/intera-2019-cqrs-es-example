<?php
declare(strict_types=1);
namespace Roulette\Domain\Policy;
use Roulette\Domain\DomainEvent\BettingStarted;
use Prooph\Common\Messaging\Command;
final class WhenBettingStarted
{
    /**
     * @return Command []
     */
    public function __invoke(BettingStarted $eventBettingStarted)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}