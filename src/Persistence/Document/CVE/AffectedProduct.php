<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class AffectedProduct
{
    #[ODM\Field]
    private ?string $vendor = null;

    #[ODM\Field]
    private ?string $product = null;

    public function getVendor(): ?string
    {
        return $this->vendor;
    }

    public function setVendor(?string $vendor): self
    {
        $this->vendor = $vendor;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): self
    {
        $this->product = $product;

        return $this;
    }
}