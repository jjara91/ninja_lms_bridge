<?php
declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use LMSBridge\Catalog\Domain\Course;
use LMSBridge\Catalog\Domain\Duration;

final class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $course1 = new Course(
            id: 1,
            name: 'Course 1',
            description: 'Course 1 description',
            duration: new Duration(1000),
        );

        $manager->persist($course1);

        $course2 = new Course(
            id: 2,
            name: 'Course 2',
            description: 'Course 2 description',
            duration: new Duration(2000),
        );

        $manager->persist($course2);

        $manager->flush();
    }
}
