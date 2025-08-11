<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\AffectionStatus;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
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
     * @var Collection<non-negative-int, AffectedVersion>|AffectionStatus|null
     */
    #[ODM\EmbedMany]
    private mixed $versions = null;

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

    /**
     * @return AffectedVersions
     */
    public function getVersions(): AffectedVersions
    {
        return new AffectedVersions($this->versions);
    }

    /**
     * @param AffectedVersions $versions
     */
    public function setVersions(AffectedVersions $versions): self
    {
        try {
            $this->versions = $versions->versions();

            return $this;
        } catch (\InvalidArgumentException) {
            try {
                $this->versions = $versions->status();

                return $this;
            } catch (\InvalidArgumentException) {
                throw new \LogicException('123');
            }
        }
    }
}
