<?php

declare(strict_types=1);

namespace Roulette\Domain\Command;

use Prooph\Common\Messaging\Command;

final class StartRound extends Command
{
    private function __construct()
    {
        $this->init();

    }

    /** {@inheritDoc} */
    public function payload() : array
    {
        return [
        ];
    }

    /** {@inheritDoc} */
    protected function setPayload(array $payload)
    {
    }
}
