<?php

declare(strict_types=1);

namespace CE\Domain\Model;

interface StudentRepository
{
    public function findByName(string $name): ?Student;
}
