<?php

declare(strict_types=1);

namespace CE\Infrastructure\Persistence\InMemory;

use CE\Domain\Model\Student;
use CE\Domain\Model\StudentRepository;

final class InMemoryStudentRepository implements StudentRepository
{
    private $students;

    /**
     * @param Student[] $students
     */
    public function __construct(array $students)
    {
        $this->students = $students;
    }
    public function findByName(string $name): ?Student
    {
        foreach ($this->students as $student) {
            if ($name === $student->studentName()) {
                return $student;
            }
        }

        return null;
    }
}
