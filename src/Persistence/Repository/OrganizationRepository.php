<?php

declare(strict_types=1);

namespace App\Persistence\Repository;

use App\Persistence\Entity\Organization;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

final readonly class OrganizationRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function findAllPaginated(int $offset, int $size): Paginator
    {
        $dql = 'SELECT o FROM App\Entity\Organization o';

        $query = $this->entityManager->createQuery($dql)
            ->setFirstResult($offset)
            ->setMaxResults($size);

        return new Paginator($query);
    }

    public function findById(int $id): ?Organization
    {
        $dql = 'SELECT o FROM App\Entity\Organization o where o.id = :id';

        $query = $this->entityManager->createQuery($dql);

        $query->setParameter('id', $id);

        return $query->getOneOrNullResult();
    }

    public function save(Organization $organization): void
    {
    }

    public function delete(Organization $organization): void
    {
    }
}
