<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Subject;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Package
{
    public function __construct(
        #[ODM\Field]
        private string $collectionUrl,
        #[ODM\Field]
        private string $name,
        #[ODM\Field]
        private ?string $vendor = null,
        #[ODM\Field]
        private ?string $product = null,
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

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->vendor ??= null;
        $this->product ??= null;
    }
}
