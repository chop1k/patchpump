<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class TaxonomyMapping
{
    #[ODM\Field]
    private ?string $name = null;

    #[ODM\Field]
    private ?string $version = null;

    /**
     * @var Collection<TaxonomyRelation>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $relations = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getRelations(): ?Collection
    {
        return $this->relations;
    }

    public function setRelations(?Collection $relations): self
    {
        $this->relations = $relations;

        return $this;
    }
}
