<?php
declare(strict_types=1);

namespace Event\Support\Enum;


/**
 * Example of usage
 *
 * <code>echo SomeEnumClass::create('dog')</code>
 * <output>1</output>
 */
abstract class BaseAssociativeEnum implements Enumerator
{
    /**
     * Item key
     *
     * @var int
     */
    protected $key;

    /**
     * Iten name
     *
     * @var string
     */
    protected $name;

    /**
     * BaseAssociativeEnum constructor.
     *
     * @param int $key
     */
    protected function __construct(int $key)
    {
        $this->key = $key;
        $this->name = static::getSupported()[$key];
    }

    /**
     * @inheritDoc
     */
    abstract public static function getSupported(): array;

    /**
     * @param string $name
     *
     * @return BaseAssociativeEnum|Enumerator
     */
    public static function create(string $name): Enumerator
    {
        $key = array_search($name, static::getSupported());

        if (false !== $key) {
            return new static($key);
        }

        throw new \InvalidArgumentException(sprintf('Item "%s" is not supported', $name));
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
     * @param Enumerator $enum
     *
     * @return bool
     */
    public function equals(Enumerator $enum): bool
    {
        return $this->toString() === $enum->toString();
    }

    /**
     * @return int
     */
    public function getKey(): int
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
