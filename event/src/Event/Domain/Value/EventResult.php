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
final class EventResult
{
    /** @var array<string, mixed> serializable event result */
    private $eventResult;

    private function __construct(array $eventResult)
    {
        $this->id = $id;
    }

    /** @param array<string, mixed> */
    public static function fromExternalEventResult(array $result) : self
    {
        Assert::isMap($result);
        Assert::same(unserialize(serialize($result), ['allowed_classes' => true]), $result);

        return new self($result);
    }

    public function toArray() : array
    {
        return $this->eventResult;
    }
}
