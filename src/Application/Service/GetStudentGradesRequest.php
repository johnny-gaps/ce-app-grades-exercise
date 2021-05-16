<?php

declare(strict_types=1);

namespace CE\Application\Service;

final class GetStudentGradesRequest
{
    private $studentName;
    private $schoolTerm;
    private $showDescribableGrade;

    public function __construct(string $studentName, int $schoolTerm, bool $showDescribableGrade)
    {
        $this->studentName = $studentName;
        $this->schoolTerm = $schoolTerm;
        $this->showDescribableGrade = $showDescribableGrade;
    }

    public function studentName(): string
    {
        return $this->studentName;
    }

    public function schoolTerm(): int
    {
        return $this->schoolTerm;
    }

    public function showDescribableGrade(): bool
    {
        return $this->showDescribableGrade;
    }
}
