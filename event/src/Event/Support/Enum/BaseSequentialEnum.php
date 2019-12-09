<?php
declare(strict_types=1);

namespace Event\Support\Enum;

/**
 * Example of usage
 *
 * <code>echo SomeEnumClass::create('dog')</code>
 * <output>dog</output>
 */
abstract class BaseSequentialEnum implements Enumerator
{
    /**
     * Name of item
     *
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     *
     * @throws \InvalidArgumentException if item in not supported
     */
    protected function __construct(string $name)
    {
        if (false === in_array(strtolower($name), array_map('strtolower', static::getSupported()))) {
            throw new \InvalidArgumentException(
                sprintf('Item "%s" is not supported for %s', $name, get_called_class()),
                400
            );
        }

        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    abstract public static function getSupported(): array;

    /**
     * Method is responsible for instantiation of class
     *
     * @param string $value
     *
     * @return static
     * @throws \InvalidArgumentException if item in not supported
     *
     */
    public static function create(string $value): Enumerator
    {
        if (false === in_array(strtolower($value), array_map('strtolower', static::getSupported()))) {
            throw new \InvalidArgumentException(
                sprintf('Item "%s" is not supported for %s', $value, get_called_class()), 400
            );
        }

        return new static($value);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function isSupported(string $name): bool
    {
        return in_array($name, static::getSupported());
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->name;
    }

    /**
     *
     * @param Enumerator $enum
     *
     * @return bool
     */
    public function equals(Enumerator $enum): bool
    {
        return $this->toString() === $enum->toString();
    }
}
