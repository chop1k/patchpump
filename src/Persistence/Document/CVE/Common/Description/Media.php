<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common\Description;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Media
{
    public function __construct(
        #[ODM\Field]
        private string $type,

        #[ODM\Field]
        private string $content,

        #[ODM\Field]
        private ?bool $base64,
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
}
