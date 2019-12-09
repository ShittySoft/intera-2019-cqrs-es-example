<?php

declare(strict_types=1);

namespace Event\Domain\Policy;

use Event\Domain\DomainEvent\EventResultInvalidated;
use Prooph\Common\Messaging\Command;

final class WhenBetEventCanceled
{
    /**
     * @return Command []
     */
    public function __invoke(EventResultInvalidated $eventResultInvalidated)
    {
        throw new \BadMethodCallException('Missing method implementation.');
    }
}