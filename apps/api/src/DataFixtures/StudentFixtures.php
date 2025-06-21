<?php
declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use LMSBridge\Student\Domain\Student;

final class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $student1 = new Student(
            id: null,
            name: 'Student 1',
        );

        $manager->persist($student1);

        $student2 = new Student(
            id: null,
            name: 'Student 2',
        );

        $manager->persist($student2);

        $manager->flush();
    }
}
