<?php

declare(strict_types=1);

namespace LMSBridge\Catalog\Application;

use LMSBridge\Catalog\Domain\CourseRepositoryInterface;

readonly final class ListCourses
{
    public function __construct(
        private CourseRepositoryInterface $repository,
    ) {
    }

    public function __invoke(): array
    {
        return $this->repository->getPublishedCourses();
    }
}
