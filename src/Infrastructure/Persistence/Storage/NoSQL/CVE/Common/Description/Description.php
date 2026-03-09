<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description;

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

        /**
         * @var Collection<non-negative-int, Media>|null $media
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'media' => Media::class,
            ]
        )]
        private ?Collection $media = null,
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

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->media ??= null;
    }
}
