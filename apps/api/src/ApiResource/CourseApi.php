<?php

declare(strict_types=1);

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Interface\DTOApiResource;
use App\State\EntityToDtoStateProvider;
use LMSBridge\Catalog\Domain\Course;

#[ApiResource(
    shortName: 'Course',
    operations: [
        new Get(),
        new GetCollection(
            parameters: [
                'name' => new QueryParameter(filter: 'course.search_filter', property: 'name')
            ]
        ),
    ],
    provider: EntityToDtoStateProvider::class,
    stateOptions: new Options(entityClass: Course::class),
)]
final class CourseApi implements DTOApiResource
{
    public function __construct(
        #[ApiProperty(identifier: true)] public int $id,
        public string $name,
        public string $description,
        public int $durationInMinutes,
    ) {
    }

    public static function fromEntity(object $entity): DTOApiResource
    {
        if (! $entity instanceof Course) {
            throw new \InvalidArgumentException('The $entity parameter must be an instance of the Course class.');
        }

        return new self(
            id: $entity->id,
            name: $entity->name,
            description: $entity->description,
            durationInMinutes: $entity->duration->toRoundedMinutes(),
        );
    }
}
