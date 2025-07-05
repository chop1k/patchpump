<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\ArrayCollection;

final class AffectedMapper
{
    public static function mapSchemaToPersistence(Schema\Affected $schema): Persistence\Affected
    {
        $persistence = new Persistence\Affected();

        if ($schema->vendor !== null && $schema->product !== null) {
            $product = new Persistence\AffectedProduct();

            $product->setVendor($schema->vendor);
            $product->setProduct($schema->product);

            $persistence->setProduct($product);
        }

        if ($schema->packageName !== null && $schema->collectionURL !== null) {
            $package = new Persistence\AffectedPackage();

            $package->setName($schema->packageName);
            $package->setCollectionUrl($schema->collectionURL);

            $persistence->setPackage($package);
        }

        if ($schema->programFiles !== null || $schema->programRoutines !== null || $schema->repo !== null || $schema->modules !== null) {
            $source = new Persistence\AffectedSource();

            $source->setRepository($schema->repo);
            $source->setModules($schema->modules);
            $source->setFiles($schema->programFiles);
            $source->setRoutines($schema->programRoutines);

            $persistence->setSource($source);
        }

        $persistence->setCpe($schema->cpes);
        $persistence->setPlatforms($schema->platforms);

        if ($schema->defaultStatus !== null) {
            if (strtolower($schema->defaultStatus) === 'affected') {
                $persistence->setVersions(AffectionStatus::Affected);
            }
            if (strtolower($schema->defaultStatus) === 'unaffected') {
                $persistence->setVersions(AffectionStatus::Unaffected);
            }
            if (strtolower($schema->defaultStatus) === 'unknown') {
                $persistence->setVersions(AffectionStatus::Unknown);
            }
        }

        if ($schema->versions !== null) {
            $filtered = array_filter(
                $schema->versions,
                static fn (mixed $change) => is_object($change) && get_class($change) === Schema\AffectedVersion::class,
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