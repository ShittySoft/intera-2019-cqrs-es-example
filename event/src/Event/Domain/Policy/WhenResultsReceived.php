<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultReceived;

final class WhenResultsReceived
{
    /**
     * @param EventResultReceived $eventResultReceived
     */
    public function __invoke(EventResultReceived $eventResultReceived)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}