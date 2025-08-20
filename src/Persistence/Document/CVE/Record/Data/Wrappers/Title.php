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
class Title
{
    public function __construct(
        #[ODM\Field]
        private string $providedBy,

        /**
         * @var string $value
         */
        #[ODM\Field]
        private string $value,
    ) {
    }

    public function providedBy(): string
    {
        return $this->providedBy;
    }

    public function value(): string
    {
        return $this->value;
    }
}
