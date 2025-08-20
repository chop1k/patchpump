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
class Timeline
{
    public function __construct(
        #[ODM\Field]
        private string $language,

        #[ODM\Field]
        private string $content,

        #[ODM\Field]
        private \DateTimeImmutable $timestamp,
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

    public function timestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }
}
