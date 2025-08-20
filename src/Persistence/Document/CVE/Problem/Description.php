<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Problem;

use App\Persistence\Document\CVE\Common\Reference;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Description
{
    public function __construct(
        #[ODM\Field]
        private string $language,

        #[ODM\Field]
        private string $content,

        #[ODM\Field]
        private ?string $cwe,

        #[ODM\Field]
        private ?string $type,

        /**
         * @var Collection<non-negative-int, Reference>|null $references
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'reference' => Reference::class,
            ]
        )]
        private ?Collection $references,
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
}
