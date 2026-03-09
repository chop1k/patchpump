<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Description
{
    public function __construct(
        #[ODM\Field]
        private string $language,
        #[ODM\Field]
        private string $content,
        #[ODM\Field]
        private ?string $cwe = null,
        #[ODM\Field]
        private ?string $type = null,

        /**
         * @var Collection<non-negative-int, Reference>|null $references
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reference' => Reference::class,
            ]
        )]
        private ?Collection $references = null,
    ) {
    }

    public function language(): string
    {
        return $this->language;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function cwe(): ?string
    {
        return $this->cwe;
    }

    public function type(): ?string
    {
        return $this->type;
    }

    /**
     * @return Collection<non-negative-int, Reference>|null
     */
    public function references(): ?Collection
    {
        return $this->references;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->cwe ??= null;
        $this->type ??= null;
        $this->references ??= null;
    }
}
