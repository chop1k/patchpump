<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @readonly
 *
 * @template MetadataT
 * @template AssignerT
 * @template DataT
 */
#[ODM\MappedSuperclass]
#[ODM\HasLifecycleCallbacks]
#[ODM\DiscriminatorField('_type')]
#[ODM\DiscriminatorMap([
    'published' => Published::class,
    'rejected' => Rejected::class,
])]
abstract class AbstractRecord
{
    public function __construct(
        #[ODM\Id(strategy: 'NONE')]
        private string $id,

        /**
         * @var AssignerT $assigner
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'PUBLISHED' => Metadata\Assigner\Published::class,
                'REJECTED' => Metadata\Assigner\Rejected::class,
            ]
        )]
        private mixed $assigner,

        /**
         * @var DataT $data
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'PUBLISHED' => Data\Published::class,
                'REJECTED' => Data\Rejected::class,
            ]
        )]
        private mixed $data,

        /**
         * @var MetadataT|null $metadata
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'PUBLISHED' => Metadata\Published::class,
                'REJECTED' => Metadata\Rejected::class,
            ]
        )]
        private mixed $metadata = null,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return MetadataT|null
     */
    public function metadata(): mixed
    {
        return $this->metadata;
    }

    /**
     * @return AssignerT
     */
    public function assigner(): mixed
    {
        return $this->assigner;
    }

    /**
     * @return DataT
     */
    public function data(): mixed
    {
        return $this->data;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->metadata ??= null;
    }
}
