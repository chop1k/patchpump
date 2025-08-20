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
class Status
{
    public function __construct(
        #[ODM\Field]
        protected Affection $status,
    ) {
    }

    public function status(): Affection
    {
        return $this->status;
    }
}
