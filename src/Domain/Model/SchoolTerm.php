<?php

declare(strict_types=1);

namespace CE\Domain\Model;

use InvalidArgumentException;

final class SchoolTerm
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 3) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%d>.', static::class, $value));
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
