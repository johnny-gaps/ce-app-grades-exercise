<?php

declare(strict_types=1);

namespace CE\Domain\Model;

interface DescribableGradeRangeRepository
{
    public function searchAll(): array;
}
