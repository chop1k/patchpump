<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class RecordProvider
{
    public function __construct(
        private Schema\ProviderMetadata $schema,
    ) {
    }

    public function toPersistence(): Persistence\ContainerProvider
    {
        $persistence = new Persistence\ContainerProvider();

        $persistence->setOrgId($this->schema->orgId);
        $persistence->setOrgName($this->schema->shortName);

        if (null !== $this->schema->dateUpdated) {
            $timestamp = new Timestamp($this->schema->dateUpdated);

            try {
                $persistence->setUpdatedAt($timestamp->toDateTimeImmutable());
            } catch (\InvalidArgumentException) {
                $persistence->setUpdatedAt(null);
            }
        }

        return $persistence;
    }
}
