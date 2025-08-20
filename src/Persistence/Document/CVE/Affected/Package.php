<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends AbstractAffected<Subject\Package>
 */
#[ODM\EmbeddedDocument]
class Package extends AbstractAffected
{
}
