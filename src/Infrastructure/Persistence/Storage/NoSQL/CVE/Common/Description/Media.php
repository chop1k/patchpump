<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Media
{
    public function __construct(
        #[ODM\Field]
        private string $type,
        #[ODM\Field]
        private string $content,
        #[ODM\Field]
        private ?bool $base64 = null,
    ) {
    }

    public function type(): string
    {
        return $this->type;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function base64(): ?bool
    {
        return $this->base64;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->base64 ??= null;
    }
}
