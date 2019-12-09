<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultReceived;
use Prooph\Common\Messaging\Command;

final class WhenResultsReceived
{
    /**
     * @return Command []
     */
    public function __invoke(EventResultReceived $eventResultReceived)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}