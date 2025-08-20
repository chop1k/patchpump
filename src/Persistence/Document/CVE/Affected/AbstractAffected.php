<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @template T
 */
#[ODM\MappedSuperclass]
abstract class AbstractAffected
{
    public function __construct(
        /**
         * @var T $subject
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'product' => Subject\Product::class,
                'package' => Subject\Package::class,
            ]
        )]
        protected mixed $subject,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'source' => Source::class,
            ]
        )]
        protected ?Source $source,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'enumeration' => Enumeration::class,
            ]
        )]
        protected Enumeration $enumeration,
    ) {
    }

    /**
     * @return T
     */
    public function subject(): mixed
    {
        return $this->subject;
    }

    public function source(): ?Source
    {
        return $this->source;
    }

    public function enumeration(): Enumeration
    {
        return $this->enumeration;
    }
}
