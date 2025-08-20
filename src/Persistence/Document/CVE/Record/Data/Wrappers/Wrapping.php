<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Wrappers;

use App\Persistence\Document\CVE\Affected;
use App\Persistence\Document\CVE\Common;
use App\Persistence\Document\CVE\CPE;
use App\Persistence\Document\CVE\Problem;
use App\Persistence\Document\CVE\Taxonomy;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @template T
 */
#[ODM\MappedSuperclass]
abstract class Wrapping
{
    public function __construct(
        #[ODM\Field]
        private string $providedBy,

        /**
         * @var T $wrappedIn
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'affected_product' => Affected\Product::class,
                'affected_package' => Affected\Package::class,
                'cpe' => CPE\Applicability::class,
                'problem' => Problem\Type::class,
                'taxonomy' => Taxonomy\Mapping::class,
                'credit' => Common\Credit::class,
                'timeline' => Common\Timeline::class,
                'reference' => Common\Reference::class,
                'description' => Common\Description\Description::class,
            ]
        )]
        private mixed $wrappedIn,
    ) {
    }

    public function providedBy(): string
    {
        return $this->providedBy;
    }

    /**
     * @return T
     */
    public function wrappedIn(): mixed
    {
        return $this->wrappedIn;
    }
}
