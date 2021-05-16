<?php

declare(strict_types=1);

namespace CE\Domain\Service;

use CE\Domain\Model\DescribableGradeRange;
use CE\Domain\Model\Grade;

class TranslatableGradeService
{
    private $describableGradeRanges;

    /**
     * @param DescribableGradeRange[]
     */
    public function __construct(array $describableGradeRanges)
    {
        $this->describableGradeRanges = $describableGradeRanges;
    }

    public function toDescribableGrade(Grade $grade): ?string
    {
        foreach ($this->describableGradeRanges as $describableGradeRange) {
            if ($describableGradeRange->isInRange($grade)) {
                return $describableGradeRange->describableGrade();
            }
        }

        return null;
    }
}
