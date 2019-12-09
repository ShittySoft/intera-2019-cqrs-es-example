<?php

namespace Event\Domain\Value;

class EventType extends BaseAssociativeEnum
{

    public static function getSupported(): array
    {
        return [
            "ROULETTE_ROUND"
        ];
    }
}