<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Record\Data;

use App\Domain\CVE\Mapping\Schema\Common\Description;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final readonly class Rejected
{
    public function __construct(
        private Schema\CNA $schema,
    ) {
    }

    public function toPersistence(): Persistence\Record\Data\Rejected
    {
        return new Persistence\Record\Data\Rejected(
            $this->provider(),
            $this->reasons(),
            $this->schema->replacedBy,
        );
    }

    private function provider(): Persistence\Record\Data\Provider\Rejected
    {
        if (null === $this->schema->providerMetadata) {
            throw new \InvalidArgumentException();
        }

        return (new Provider\Rejected($this->schema->providerMetadata))->toPersistence();
    }

    /**
     * @return ArrayCollection<non-negative-int, Persistence\Common\Description\Description>
     */
    private function reasons(): ArrayCollection
    {
        if (null === $this->schema->rejectedReasons) {
            throw new \InvalidArgumentException();
        }

        $elements = array_map(
            static fn (Schema\Description $node) => (new Description($node))->toPersistence(),
            array_values($this->schema->rejectedReasons),
        );

        return new ArrayCollection($elements);
    }
}
