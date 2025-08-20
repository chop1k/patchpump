<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected\Version;

use App\Persistence\Document\CVE\Affected\Affection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Change
{
    public function __construct(
        #[ODM\Field]
        private string $at,

        #[ODM\Field]
        private Affection $status,
    ) {
    }

    public function at(): string
    {
        return $this->at;
    }

    public function status(): Affection
    {
        return $this->status;
    }
}
