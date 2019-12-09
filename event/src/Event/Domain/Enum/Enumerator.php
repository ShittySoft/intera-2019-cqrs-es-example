<?php
declare(strict_types=1);

namespace Event\Domain\Value;

interface Enumerator
{
    /**
     * @param string $value
     *
     * @return Enumerator
     */
    public static function create(string $value): Enumerator;

    /**
     * @return string[]
     */
    public static function getSupported(): array;

    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @return string
     */
    public function toString(): string;

    /**
     * @param Enumerator $enum
     *
     * @return bool
     */
    public function equals(Enumerator $enum): bool;
}
