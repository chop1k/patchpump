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
class Tags
{
    public function __construct(
        #[ODM\Field]
        private string $providedBy,

        /**
         * @var string[] $values
         */
        #[ODM\Field(type: 'collection')]
        private array $values,
    ) {
    }

    public function providedBy(): string
    {
        return $this->providedBy;
    }

    /**
     * @return string[]
     */
    public function values(): array
    {
        return $this->values;
    }
}
