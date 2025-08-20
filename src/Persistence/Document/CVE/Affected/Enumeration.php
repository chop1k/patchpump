<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected;

use App\Persistence\Document\CVE\Affected\Version\_List;
use App\Persistence\Document\CVE\Affected\Version\Status;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
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
        private ?array $cpe,

        /**
         * @var string[]|null $platforms
         */
        #[ODM\Field(type: 'collection')]
        private ?array $platforms,
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
}
