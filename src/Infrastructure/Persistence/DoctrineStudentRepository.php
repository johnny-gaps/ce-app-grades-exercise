<?php

namespace CE\Infrastructure\Persistence;

use CE\Domain\Model\Student;
use CE\Domain\Model\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineStudentRepository implements StudentRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findByName(string $name): ?Student
    {
        $result = $this->entityManager->getRepository(Student::class)->findBy(['studentName' => $name]);

        return empty($result) ? null : $result[0];
    }
}
