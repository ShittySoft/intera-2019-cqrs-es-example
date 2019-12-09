<?php
declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\Value\EventStarted;
use Prooph\Common\Messaging\Command;

final class WhenEventStarted
{
    /**
     * @return Command []
     */
    public function __invoke(EventStarted $eventStarted)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}