<?php

namespace App\State;

use ApiPlatform\Doctrine\Orm\Paginator;
use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Doctrine\Orm\State\ItemProvider;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination\TraversablePaginator;
use ApiPlatform\State\ProviderInterface;
use App\Interface\DTOApiResource;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class EntityToDtoStateProvider implements ProviderInterface
{
    public function __construct(
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
        #[Autowire(service: ItemProvider::class)] private ProviderInterface $itemProvider,
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {

            /** @var Paginator $entities */
            $entities = $this->collectionProvider->provide($operation, $uriVariables, $context);

            $dtos = [];

            foreach ($entities as $entity) {
                $dtos[] = $this->mapEntityToDTO($entity, $context['force_resource_class']);
            }

            return new TraversablePaginator(
                new \ArrayIterator($dtos),
                $entities->getCurrentPage(),
                $entities->getItemsPerPage(),
                $entities->getTotalItems(),
            );
        }

        $entity = $this->itemProvider->provide($operation, $uriVariables, $context);

        if (!$entity) {
            return null;
        }

        return $this->mapEntityToDto($entity, $context['force_resource_class']);
    }

    private function mapEntityToDTO(object $entity, string $classDTO): DTOApiResource
    {
        if (!in_array(DTOApiResource::class, class_implements($classDTO), true)) {
            throw new \InvalidArgumentException('The $classDTO parameter must be an instance of the DTOApiResource class.');
        }

        return call_user_func([$classDTO, 'fromEntity'], $entity);
    }
}
