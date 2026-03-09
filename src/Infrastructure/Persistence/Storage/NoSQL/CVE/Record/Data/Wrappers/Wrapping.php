<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Wrappers;

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
                'affected_product' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Product::class,
                'affected_package' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Package::class,
                'cpe' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\CPE\Applicability::class,
                'problem' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Problem\Type::class,
                'taxonomy' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Taxonomy\Mapping::class,
                'credit' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Credit::class,
                'timeline' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Timeline::class,
                'reference' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Reference::class,
                'description' => \App\Infrastructure\Persistence\Storage\NoSQL\CVE\Common\Description\Description::class,
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
