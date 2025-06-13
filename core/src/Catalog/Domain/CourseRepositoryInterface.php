<?php

namespace LMSBridge\Catalog\Domain;

interface CourseRepositoryInterface
{
    public function getPublishedCourses(): array;
}