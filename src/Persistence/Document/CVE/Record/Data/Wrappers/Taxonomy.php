<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Wrappers;

use App\Persistence\Document\CVE\Taxonomy\Mapping as WrappedIn;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends Wrapping<WrappedIn>
 */
#[ODM\EmbeddedDocument]
class Taxonomy extends Wrapping
{
}
