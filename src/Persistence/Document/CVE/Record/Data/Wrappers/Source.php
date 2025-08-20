<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Wrappers;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Source
{
    public function __construct(
        #[ODM\Field]
        private string $providedBy,

        /**
         * @var array<string, mixed> $data
         */
        #[ODM\Field(type: 'collection')]
        private array $data,
    ) {
    }

    public function providedBy(): string
    {
        return $this->providedBy;
    }

    /**
     * @return array<string, mixed>
     */
    public function data(): array
    {
        return $this->data;
    }
}
