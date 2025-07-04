<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class AffectedMapper
{
    public static function mapSchemaToPersistence(?Schema\Affected $schema): ?Persistence\Affected
    {
        if (null === $schema) {
            return null;
        }

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

        if ($schema->versions !== null) {
            $persistence->setVersions(
                new ArrayCollection(
                    array_map(AffectedVersionMapper::mapSchemaToPersistence(...), $schema->versions)
                ),
            );
        }

        return $persistence;
    }
}