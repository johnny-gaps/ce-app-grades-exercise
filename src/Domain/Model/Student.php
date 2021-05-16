<?php

declare(strict_types=1);

namespace CE\Domain\Model;

final class Student
{
    private $id;
    private $studentName;
    private $gradeTerm1;
    private $gradeTerm2;
    private $gradeTerm3;

    public function __construct(int $id, string $studentName, Grade $gradeTerm1, Grade $gradeTerm2, Grade $gradeTerm3)
    {
        $this->id = $id;
        $this->studentName = $studentName;
        $this->gradeTerm1 = $gradeTerm1;
        $this->gradeTerm2 = $gradeTerm2;
        $this->gradeTerm3 = $gradeTerm3;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function studentName(): string
    {
        return $this->studentName;
    }

    public function gradeTerm1(): Grade
    {
        return $this->gradeTerm1;
    }

    public function gradeTerm2(): Grade
    {
        return $this->gradeTerm2;
    }

    public function gradeTerm3(): Grade
    {
        return $this->gradeTerm3;
    }

    public function grade(SchoolTerm $term): Grade
    {
        return call_user_func([$this, 'gradeTerm'.$term->value()]);
    }
}
