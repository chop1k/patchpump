<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\AffectionStatus;

final readonly class Affected
{
    public function __construct(
        private Schema\Affected $schema,
    ) {
    }

    public function toPersistence(): Persistence\Affected
    {
        $persistence = new Persistence\Affected();

        if (null !== $this->schema->vendor && null !== $this->schema->product) {
            $product = new Persistence\AffectedProduct();

            $product->setVendor($this->schema->vendor);
            $product->setProduct($this->schema->product);

            $persistence->setProduct($product);
        }

        if (null !== $this->schema->packageName && null !== $this->schema->collectionURL) {
            $package = new Persistence\AffectedPackage();

            $package->setName($this->schema->packageName);
            $package->setCollectionUrl($this->schema->collectionURL);

            $persistence->setPackage($package);
        }

        if (null !== $this->schema->programFiles || null !== $this->schema->programRoutines
            || null !== $this->schema->repo || null !== $this->schema->modules) {
            $source = new Persistence\AffectedSource();

            $source->setRepository($this->schema->repo);
            $source->setModules($this->schema->modules);
            $source->setFiles($this->schema->programFiles);
            $source->setRoutines($this->schema->programRoutines);

            $persistence->setSource($source);
        }

        $persistence->setCpe($this->schema->cpes);
        $persistence->setPlatforms($this->schema->platforms);

        if (null !== $this->schema->defaultStatus) {
            $status = strtolower($this->schema->defaultStatus ?? '');

            $persistence->setVersions(
                match ($status) {
                    'unknown' => AffectionStatus::Unknown,
                    'affected' => AffectionStatus::Affected,
                    'unaffected' => AffectionStatus::Unaffected,
                    default => null,
                }
            );
        }

        if (null !== $this->schema->versions) {
            $versions = new ChaoticCollection(
                $this->schema->versions,
                $this->mapVersion(...),
            );

            $versions = $versions
                ->ensureInstanceOf(Schema\AffectedVersion::class)
                ->map()
                ->toArrayCollection();

            $persistence->setVersions($versions);
        }

        return $persistence;
    }

    private function mapVersion(Schema\AffectedVersion $version): Persistence\AffectedVersion
    {
        $mapping = new AffectedVersion($version);

        return $mapping->toPersistence();
    }
}
