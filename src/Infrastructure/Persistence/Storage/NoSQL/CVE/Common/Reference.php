<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Reference
{
    public function __construct(
        #[ODM\Field]
        private string $url,
        #[ODM\Field]
        private ?string $name = null,

        /**
         * @var string[]|null $tags
         */
        #[ODM\Field(type: 'collection')]
        private ?array $tags = null,
    ) {
    }

    public function url(): string
    {
        return $this->url;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    /**
     * @return string[]|null
     */
    public function tags(): ?array
    {
        return $this->tags;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->name ??= null;
        $this->tags ??= null;
    }
}
