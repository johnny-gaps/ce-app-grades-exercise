<?php

declare(strict_types=1);

namespace CE\Domain\Model;

use InvalidArgumentException;

final class GradeRange
{
    private $min;
    private $max;

    public function __construct(Grade $min, Grade $max)
    {
        if ($min->greaterThan($max)) {
            throw new InvalidArgumentException(sprintf('<%s> invalid range <%d> - <%d>.', static::class, $min->value(), $max->value()));
        }

        $this->min = $min;
        $this->max = $max;
    }

    public function min(): Grade
    {
        return $this->min;
    }

    public function max(): Grade
    {
        return $this->max;
    }

    public function isInRange(Grade $grade): bool
    {
        return $this->min->lessThanOrEquals($grade) && $this->max->greaterThanOrEquals($grade);
    }
}
