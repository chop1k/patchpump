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
class Product
{
    public function __construct(
        #[ODM\Field]
        private string $vendor,
        #[ODM\Field]
        private string $product,
        #[ODM\Field]
        private ?string $collectionUrl = null,
        #[ODM\Field]
        private ?string $name = null,
    ) {
    }

    public function vendor(): string
    {
        return $this->vendor;
    }

    public function product(): string
    {
        return $this->product;
    }

    public function collectionURL(): ?string
    {
        return $this->collectionUrl;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->collectionUrl ??= null;
        $this->name ??= null;
    }
}
