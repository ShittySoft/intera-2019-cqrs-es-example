<?php

declare(strict_types=1);

namespace Event\Domain\Value;

use Webmozart\Assert\Assert;

/**
 * Contains an event result, which varies depending on which kind of
 * betting event we are talking about. Be it tennis, football, running
 * or poker, we do need to somehow store the result as a map of
 * results, which cannot really be made more specific due to the very
 * generic nature of a betting event.
 *
 * @psalm-immutable
 */
final class EventOdds
{
    /** @var array<string, mixed> serializable event result */
    private $eventOdds;

    private function __construct(array $eventOdds)
    {
        $this->eventOdds = $eventOdds;
    }

    /** @param array<string, mixed> $odds */
    public static function fromExternalEventResult(array $odds) : self
    {
        Assert::isMap($odds);
        Assert::same(unserialize(serialize($odds), ['allowed_classes' => true]), $odds);

        return new self($odds);
    }

    public function toArray() : array
    {
        return $this->eventOdds;
    }
}
