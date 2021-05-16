<?php

declare(strict_types=1);

namespace CE\Domain\Model;

final class DescribableGradeRange
{
    private $id;
    private $describableGrade;
    private $range;

    public function __construct(int $id, string $describableGrade, GradeRange $range)
    {
        $this->id = $id;
        $this->describableGrade = $describableGrade;
        $this->range = $range;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function describableGrade(): string
    {
        return $this->describableGrade;
    }

    public function range(): GradeRange
    {
        return $this->range;
    }

    public function isInRange(Grade $grade): bool
    {
        return $this->range->isInRange($grade);
    }
}
