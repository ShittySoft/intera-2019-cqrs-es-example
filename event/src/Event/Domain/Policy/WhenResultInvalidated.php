<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultInvalidated;

final class WhenResultInvalidated
{
    public function __invoke(EventResultInvalidated $eventResultInvalidated)
    {
        // TODO: Implement __invoke() method.
    }
}