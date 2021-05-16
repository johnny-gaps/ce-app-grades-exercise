<?php

declare(strict_types=1);

namespace CE\Domain\Model;

use InvalidArgumentException;

final class Grade
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 10) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%d>.', static::class, $value));
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function greaterThanOrEquals(Grade $grade): bool
    {
        return $this->value() >= $grade->value();
    }

    public function lessThanOrEquals(Grade $grade): bool
    {
        return $this->value() <= $grade->value();
    }

    public function greaterThan(Grade $grade): bool
    {
        return $this->value() > $grade->value();
    }

    public function lessThan(Grade $grade): bool
    {
        return $this->value() < $grade->value();
    }

    public function equals(Grade $grade): bool
    {
        return $this->value() === $grade->value();
    }
}
