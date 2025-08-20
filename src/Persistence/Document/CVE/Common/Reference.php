<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Reference
{
    public function __construct(
        #[ODM\Field]
        private string $url,

        #[ODM\Field]
        private ?string $name,

        /**
         * @var string[]|null $tags
         */
        #[ODM\Field(type: 'collection')]
        private ?array $tags,
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
}
