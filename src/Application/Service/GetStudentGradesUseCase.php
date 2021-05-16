<?php

declare(strict_types=1);

namespace CE\Application\Service;

use CE\Domain\Model\DescribableGradeRangeRepository;
use CE\Domain\Model\SchoolTerm;
use CE\Domain\Model\StudentRepository;
use CE\Domain\Model\StudentDoesNotExistException;
use CE\Domain\Service\TranslatableGradeService;

class GetStudentGradesUseCase
{
    private $studentRepository;
    private $describableGradeRangeRepository;


    public function __construct(StudentRepository $studentRepository, DescribableGradeRangeRepository $describableGradeRangeRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->describableGradeRangeRepository = $describableGradeRangeRepository;
    }

    public function __invoke(GetStudentGradesRequest $request): GetStudentGradesResponse
    {
        $term = new SchoolTerm($request->schoolTerm());

        $student = $this->studentRepository->findByName($request->studentName());
        if (null === $student) {
            throw new StudentDoesNotExistException();
        }

        if (!$request->showDescribableGrade()) {
            return new GetStudentGradesResponse($student->studentName(), $student->grade($term)->value());
        }

        $translatableGradeService = new TranslatableGradeService($this->describableGradeRangeRepository->searchAll());

        return new GetStudentGradesResponse($student->studentName(), $translatableGradeService->toDescribableGrade($student->grade($term)));
    }
}
