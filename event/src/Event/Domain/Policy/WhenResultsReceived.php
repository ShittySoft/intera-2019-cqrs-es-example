<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultReceived;

final class WhenResultsReceived
{
    public function __invoke(EventResultReceived $eventResultReceived)
    {
        // TODO: Implement __invoke() method.
    }
}