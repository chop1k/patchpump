<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Document\CVE\Record\Data;
use App\Persistence\Document\CVE\Record\Metadata;
use App\Persistence\Document\CVE\Record\Metadata\Assigner;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @template MetadataT
 * @template AssignerT
 * @template DataT
 */
#[ODM\Document(
    collection: 'records'
)]
class Record
{
    private function __construct(
        #[ODM\Id(strategy: 'NONE')]
        private string $id,

        #[ODM\Field]
        private string $type,

        /**
         * @var MetadataT $metadata
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'PUBLISHED' => Metadata\Published::class,
                'REJECTED' => Metadata\Rejected::class,
            ]
        )]
        private mixed $metadata,

        /**
         * @var AssignerT $assigner
         */
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'PUBLISHED' => Assigner\Published::class,
                'REJECTED' => Assigner\Rejected::class,
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
    ) {
    }

    /**
     * @return self<Metadata\Published, Metadata\Assigner\Published, Data\Published>
     */
    public static function withPublished(
        string $id,
        Metadata\Published $metadata,
        Assigner\Published $assigner,
        Data\Published $data,
    ): self {
        return new self($id, 'PUBLISHED', $metadata, $assigner, $data);
    }

    /**
     * @return self<Metadata\Rejected, Metadata\Assigner\Rejected, Data\Rejected>
     */
    public static function withRejected(
        string $id,
        Metadata\Rejected $metadata,
        Assigner\Rejected $assigner,
        Data\Rejected $data,
    ): self {
        return new self($id, 'REJECTED', $metadata, $assigner, $data);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function published(): bool
    {
        return 'PUBLISHED' === $this->type;
    }

    public function rejected(): bool
    {
        return 'REJECTED' === $this->type;
    }

    /**
     * @return MetadataT
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
}
