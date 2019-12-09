<?php

namespace Event\Domain\Value;

use Event\Support\Enum\BaseAssociativeEnum;

class EventType extends BaseAssociativeEnum
{

    public static function getSupported(): array
    {
        return [
            "ROULETTE_ROUND"
        ];
    }
}