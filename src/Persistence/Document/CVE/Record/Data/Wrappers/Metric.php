<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Wrappers;

use App\Persistence\Document\CVE\Metric\Container as WrappedIn;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends Wrapping<WrappedIn>
 */
#[ODM\EmbeddedDocument]
class Metric extends Wrapping
{
}
