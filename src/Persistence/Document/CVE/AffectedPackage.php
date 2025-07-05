<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class AffectedPackage
{
    #[ODM\Field]
    private ?string $collectionUrl = null;

    #[ODM\Field]
    private ?string $name = null;

    public function getCollectionUrl(): ?string
    {
        return $this->collectionUrl;
    }

    public function setCollectionUrl(?string $collectionUrl): self
    {
        $this->collectionUrl = $collectionUrl;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}