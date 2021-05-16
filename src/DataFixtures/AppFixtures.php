<?php

namespace CE\DataFixtures;

use CE\Domain\Model\DescribableGradeRange;
use CE\Domain\Model\Grade;
use CE\Domain\Model\GradeRange;
use CE\Domain\Model\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $student1 = new Student(1, 'Student1', new Grade(4), new Grade(6), new Grade(3));
        $student2 = new Student(2, 'Student2', new Grade(10), new Grade(9), new Grade(8));
        $student3 = new Student(3, 'Student3', new Grade(7), new Grade(6), new Grade(8));

        $manager->persist($student1);
        $manager->persist($student2);
        $manager->persist($student3);

        $gradeRange1 = new DescribableGradeRange(1, 'INSUFICIENT', new GradeRange(new Grade(0), new Grade(4)));
        $gradeRange2 = new DescribableGradeRange(2, 'SUFICIENT', new GradeRange(new Grade(5), new Grade(5)));
        $gradeRange3 = new DescribableGradeRange(3, 'BÉ', new GradeRange(new Grade(6), new Grade(7)));
        $gradeRange4 = new DescribableGradeRange(4, 'NOTABLE', new GradeRange(new Grade(8), new Grade(9)));
        $gradeRange5 = new DescribableGradeRange(5, 'EXCEL·LENT', new GradeRange(new Grade(10), new Grade(10)));

        $manager->persist($gradeRange1);
        $manager->persist($gradeRange2);
        $manager->persist($gradeRange3);
        $manager->persist($gradeRange4);
        $manager->persist($gradeRange5);

        $manager->flush();
    }
}
