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
class CVSS30
{
}
