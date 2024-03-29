<?php
declare(strict_types=1);

namespace Ticket\Domain\Value;

use Webmozart\Assert\Assert;
/**
 * Contains an bet odd
 *
 * @psalm-immutable
 */
final class Odd
{
    /** @var float */
    private $odd;

    private function __construct(float $odd)
    {
        $this->odd = $odd;
    }

    /** @param float $odd
     *
     * @return Odd
     */
    public static function fromInternalEventOdd(float $odd) : self
    {
        Assert::float($odd);
        if ($odd < 1) {
            throw new \InvalidArgumentException("Invalid value for odd");
        }

        return new self($odd);
    }

    public function odd() : float
    {
        return $this->odd;
    }
}
