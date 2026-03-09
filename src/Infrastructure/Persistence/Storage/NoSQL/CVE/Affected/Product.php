<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends AbstractAffected<\App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Subject\Product>
 */
#[ODM\EmbeddedDocument]
class Product extends AbstractAffected
{
}
