<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\_List;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version\Status;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Enumeration
{
    public function __construct(
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'status' => Status::class,
                'list' => _List::class,
            ]
        )]
        private mixed $versions,

        /**
         * @var string[]|null $cpe
         */
        #[ODM\Field(type: 'collection')]
        private ?array $cpe = null,

        /**
         * @var string[]|null $platforms
         */
        #[ODM\Field(type: 'collection')]
        private ?array $platforms = null,
    ) {
    }

    public function versions(): mixed
    {
        return $this->versions;
    }

    /**
     * @return string[]|null
     */
    public function cpe(): ?array
    {
        return $this->cpe;
    }

    /**
     * @return string[]|null
     */
    public function platforms(): ?array
    {
        return $this->platforms;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->cpe ??= null;
        $this->platforms ??= null;
    }
}
