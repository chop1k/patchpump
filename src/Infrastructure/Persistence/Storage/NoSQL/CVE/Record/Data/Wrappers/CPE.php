<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\CPE\Applicability as WrappedIn;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends Wrapping<WrappedIn>
 */
#[ODM\EmbeddedDocument]
class CPE extends Wrapping
{
}
