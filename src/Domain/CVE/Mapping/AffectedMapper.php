<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\ArrayCollection;

final class AffectedMapper
{
    public static function mapSchemaToPersistence(Schema\Affected $schema): Persistence\Affected
    {
        $persistence = new Persistence\Affected();

        if (null !== $schema->vendor && null !== $schema->product) {
            $product = new Persistence\AffectedProduct();

            $product->setVendor($schema->vendor);
            $product->setProduct($schema->product);

            $persistence->setProduct($product);
        }

        if (null !== $schema->packageName && null !== $schema->collectionURL) {
            $package = new Persistence\AffectedPackage();

            $package->setName($schema->packageName);
            $package->setCollectionUrl($schema->collectionURL);

            $persistence->setPackage($package);
        }

        if (null !== $schema->programFiles || null !== $schema->programRoutines || null !== $schema->repo || null !== $schema->modules) {
            $source = new Persistence\AffectedSource();

            $source->setRepository($schema->repo);
            $source->setModules($schema->modules);
            $source->setFiles($schema->programFiles);
            $source->setRoutines($schema->programRoutines);

            $persistence->setSource($source);
        }

        $persistence->setCpe($schema->cpes);
        $persistence->setPlatforms($schema->platforms);

        if (null !== $schema->defaultStatus) {
            if ('affected' === strtolower($schema->defaultStatus)) {
                $persistence->setVersions(AffectionStatus::Affected);
            }
            if ('unaffected' === strtolower($schema->defaultStatus)) {
                $persistence->setVersions(AffectionStatus::Unaffected);
            }
            if ('unknown' === strtolower($schema->defaultStatus)) {
                $persistence->setVersions(AffectionStatus::Unknown);
            }
        }

        if (null !== $schema->versions) {
            $filtered = array_filter(
                $schema->versions,
                static fn (mixed $change) => is_object($change) && Schema\AffectedVersion::class === get_class($change),
            );

            $persistence->setVersions(
                new ArrayCollection(
                    array_map(AffectedVersionMapper::mapSchemaToPersistence(...), $filtered),
                ),
            );
        }

        return $persistence;
    }
}
