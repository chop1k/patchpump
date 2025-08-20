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
class Credit
{
    public function __construct(
        #[ODM\Field]
        private string $language,

        #[ODM\Field]
        private string $content,

        #[ODM\Field]
        private ?string $user,

        #[ODM\Field]
        private ?CreditType $type,
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

    public function user(): ?string
    {
        return $this->user;
    }

    public function type(): ?CreditType
    {
        return $this->type;
    }
}
