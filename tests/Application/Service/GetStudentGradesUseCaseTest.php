<?php

namespace CE\Tests\Application\Service;

use CE\Application\Service\GetStudentGradesRequest;
use CE\Application\Service\GetStudentGradesUseCase;
use CE\Domain\Model\DescribableGradeRange;
use CE\Domain\Model\Grade;
use CE\Domain\Model\GradeRange;
use CE\Domain\Model\Student;
use CE\Domain\Model\StudentDoesNotExistException;
use CE\Infrastructure\Persistence\InMemory\InMemoryDescribableGradeRangeRepository;
use CE\Infrastructure\Persistence\InMemory\InMemoryStudentRepository;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GetStudentGradesUseCaseTest extends TestCase
{
    private $getStudentGradesUseCase;
    private $studentRepository;
    private $describableGradeRangeRepository;

    public function setUp(): void
    {
        $this->setUpStudentRepository();
        $this->setUpDescribableGradeRangeRepository();

        $this->getStudentGradesUseCase = new GetStudentGradesUseCase(
            $this->studentRepository,
            $this->describableGradeRangeRepository
        );
    }

    private function setUpStudentRepository()
    {
        $this->studentRepository = new InMemoryStudentRepository([
            new Student(1, 'Student1', new Grade(1), new Grade(5), new Grade(9)),
            new Student(2, 'Student2', new Grade(6), new Grade(10), new Grade(8)),
        ]);
    }

    private function setUpDescribableGradeRangeRepository()
    {
        $this->describableGradeRangeRepository = new InMemoryDescribableGradeRangeRepository([
            new DescribableGradeRange(1, 'Insuficient', new GradeRange(new Grade(0), new Grade(4))),
            new DescribableGradeRange(2,  'Suficient', new GradeRange(new Grade(5), new Grade(5))),
            new DescribableGradeRange(3, 'Bé', new GradeRange(new Grade(6), new Grade(7))),
            new DescribableGradeRange(3, 'Notable', new GradeRange(new Grade(8), new Grade(9))),
            new DescribableGradeRange(3, 'Excelent', new GradeRange(new Grade(10), new Grade(10))),
        ]);
    }

    /**
     * @test
     */
    public function getNonExistingStudentThrowsException()
    {
        $this->expectException(StudentDoesNotExistException::class);

        ($this->getStudentGradesUseCase)(new GetStudentGradesRequest('NotFoundSTudent', 1, false));
    }

    /**
     * @test
     */
    public function wrongRequestTermThrowsInvalidException()
    {
        $this->expectException(InvalidArgumentException::class);

        ($this->getStudentGradesUseCase)(new GetStudentGradesRequest('Student1', 5, false));
    }

    /**
     * @test
     */
    public function getStudentGrade()
    {
        $response = ($this->getStudentGradesUseCase)(new GetStudentGradesRequest('Student1', 1, false));

        $this->assertEquals('Student1', $response->studentName());
        $this->assertEquals(1, $response->grade());
    }

    /**
     * @test
     */
    public function getStudentGradeWithDescribableOption()
    {
        $response = ($this->getStudentGradesUseCase)(new GetStudentGradesRequest('Student2', 3, true));

        $this->assertEquals('Student2', $response->studentName());
        $this->assertEquals('Notable', $response->grade());
    }
}
