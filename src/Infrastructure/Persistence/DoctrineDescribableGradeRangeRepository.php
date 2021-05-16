<?php

namespace CE\Infrastructure\Persistence;

use CE\Domain\Model\DescribableGradeRange;
use CE\Domain\Model\DescribableGradeRangeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineDescribableGradeRangeRepository implements DescribableGradeRangeRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function searchAll(): array
    {
        return $this->entityManager->getRepository(DescribableGradeRange::class)->findAll();
    }
}
