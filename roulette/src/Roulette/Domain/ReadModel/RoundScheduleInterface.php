<?php

namespace Roulette\Domain\ReadModel;


interface RoundScheduleInterface
{
    public function rounds() : Round[]
}
