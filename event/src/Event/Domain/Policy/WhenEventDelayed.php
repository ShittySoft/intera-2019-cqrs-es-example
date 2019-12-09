<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultInvalidated;

final class WhenEventDelayed
{
    /**
     * @param EventResultInvalidated $eventResultInvalidated
     */
    public function __invoke(EventResultInvalidated $eventResultInvalidated)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}