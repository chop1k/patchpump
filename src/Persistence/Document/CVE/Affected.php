<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class Affected
{
    #[ODM\EmbedOne]
    private ?AffectedProduct $product = null;

    #[ODM\EmbedOne]
    private ?AffectedPackage $package = null;

    #[ODM\EmbedOne]
    private ?AffectedSource $source = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $cpe = null;

    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $platforms = null;

    /**
     * @var Collection<AffectedVersion>|string|null
     */
    #[ODM\EmbedMany]
    private Collection|string|null $versions = null;

    public function getProduct(): ?AffectedProduct
    {
        return $this->product;
    }

    public function setProduct(?AffectedProduct $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getPackage(): ?AffectedPackage
    {
        return $this->package;
    }

    public function setPackage(?AffectedPackage $package): self
    {
        $this->package = $package;

        return $this;
    }

    public function getSource(): ?AffectedSource
    {
        return $this->source;
    }

    public function setSource(?AffectedSource $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getCpe(): ?array
    {
        return $this->cpe;
    }

    public function setCpe(?array $cpe): self
    {
        $this->cpe = $cpe;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getPlatforms(): ?array
    {
        return $this->platforms;
    }

    /**
     * @param string[]|null $platforms
     */
    public function setPlatforms(?array $platforms): self
    {
        $this->platforms = $platforms;

        return $this;
    }

    public function getVersions(): Collection|string|null
    {
        return $this->versions;
    }

    public function setVersions(Collection|string|null $versions): self
    {
        $this->versions = $versions;

        return $this;
    }
}