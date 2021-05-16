<?php

namespace CE\Application\Service;

final class GetStudentGradesResponse
{
    private $studentName;
    private $grade;

    public function __construct(string $studentName, $grade)
    {
        $this->studentName = $studentName;
        $this->grade = $grade;
    }

    public function studentName(): string
    {
        return $this->studentName;
    }

    public function grade()
    {
        return $this->grade;
    }
}
