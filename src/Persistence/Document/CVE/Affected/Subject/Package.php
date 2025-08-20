<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected\Subject;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Package
{
    public function __construct(
        #[ODM\Field]
        private string $collectionUrl,
        #[ODM\Field]
        private string $name,
        #[ODM\Field]
        private ?string $vendor,
        #[ODM\Field]
        private ?string $product,
    ) {
    }

    public function collectionURL(): string
    {
        return $this->collectionUrl;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function vendor(): ?string
    {
        return $this->vendor;
    }

    public function product(): ?string
    {
        return $this->product;
    }
}
