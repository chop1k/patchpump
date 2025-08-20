<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Metric\Value;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Other
{
    public function __construct(
        #[ODM\Field]
        private string $type,

        /**
         * @var array<string, mixed> $content
         */
        #[ODM\Field]
        private array $content,
    ) {
    }

    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return array<string, mixed>
     */
    public function content(): array
    {
        return $this->content;
    }
}
