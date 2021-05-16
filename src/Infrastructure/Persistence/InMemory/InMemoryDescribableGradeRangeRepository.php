<?php

declare(strict_types=1);

namespace CE\Infrastructure\Persistence\InMemory;

use CE\Domain\Model\DescribableGradeRange;
use CE\Domain\Model\DescribableGradeRangeRepository;

final class InMemoryDescribableGradeRangeRepository implements DescribableGradeRangeRepository
{
    private $describableGradeRanges;

    /**
     * @param DescribableGradeRange[] $describableGradeRanges
     */
    public function __construct(array $describableGradeRanges)
    {
        $this->describableGradeRanges = $describableGradeRanges;
    }

    public function searchAll(): array
    {
        return $this->describableGradeRanges;
    }
}
