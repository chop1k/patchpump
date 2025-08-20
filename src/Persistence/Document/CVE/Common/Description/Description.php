<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common\Description;

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

        /**
         * @var Collection<non-negative-int, Media>|null $media
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'media' => Media::class,
            ]
        )]
        private ?Collection $media,
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

    /**
     * @return Collection<non-negative-int, Media>|null
     */
    public function media(): ?Collection
    {
        return $this->media;
    }
}
