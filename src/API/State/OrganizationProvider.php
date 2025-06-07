<?php

declare(strict_types=1);

namespace App\API\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\API\Resource\Inventory\Organization;

/**
 * @implements ProviderInterface<Organization>
 */
final readonly class OrganizationProvider implements ProviderInterface
{
    public function __construct(
//        private OrganizationRepository $organizationRepository,
//        private Pagination $pagination,
    ) {
    }

    #[\Override]
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
//        dump($operation, $uriVariables, $context);
//
//        if ($operation instanceof CollectionOperationInterface) {
//            return $this->provideForGetCollection($operation, $uriVariables, $context);
//        }
//
//        if ($operation instanceof Get) {
//            return $this->provideForGet($uriVariables, $context);
//        }
//
//        if ($operation instanceof Patch) {
//            return $this->provideForPatch($uriVariables, $context);
//        }
//
//        if ($operation instanceof Delete) {
//            return $this->provideForDelete($uriVariables, $context);
//        }
//
//        throw new \LogicException('what');
    }

//    private function provideForGetCollection(Operation $operation, array $uriVariables): Paginator
//    {
//        return $this->organizationRepository->findAllPaginated(
//            $this->pagination->getOffset($operation),
//            $this->pagination->getLimit($operation, $uriVariables),
//        );
//    }
//
//    private function provideForGet(array $uriVariables, array $context): Organization
//    {
//        $id = $uriVariables['organization_id'] ?? null;
//
//        if (null === $id) {
//        }
//
//        return $this->organizationRepository->findById($id);
//    }
//
//    private function provideForPatch(array $uriVariables, array $context): Organization
//    {
//    }
//
//    private function provideForDelete(array $uriVariables, array $context): Organization
//    {
//    }
}
