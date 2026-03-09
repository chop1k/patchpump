<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @template T
 */
#[ODM\MappedSuperclass]
#[ODM\HasLifecycleCallbacks]
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
                'enumeration' => Enumeration::class,
            ]
        )]
        protected Enumeration $enumeration,
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'source' => Source::class,
            ]
        )]
        protected ?Source $source = null,
    ) {
    }

    /**
     * @return T
     */
    public function subject(): mixed
    {
        return $this->subject;
    }

    public function enumeration(): Enumeration
    {
        return $this->enumeration;
    }

    public function source(): ?Source
    {
        return $this->source;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->source ??= null;
    }
}
