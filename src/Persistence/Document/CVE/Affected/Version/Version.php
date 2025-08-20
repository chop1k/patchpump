<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected\Version;

use App\Persistence\Document\CVE\Affected\Affection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Version
{
    public function __construct(
        #[ODM\Field]
        private string $version,

        #[ODM\Field]
        private Affection $status,

        #[ODM\Field]
        private ?string $type,

        #[ODM\Field]
        private ?string $lessThan,

        #[ODM\Field]
        private ?string $lessThanOrEqual,

        /**
         * @var Collection<non-negative-int, Change>|null $changes
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'version_change' => Change::class,
            ]
        )]
        private readonly ?Collection $changes,
    ) {
    }

    public function version(): string
    {
        return $this->version;
    }

    public function status(): Affection
    {
        return $this->status;
    }

    public function type(): ?string
    {
        return $this->type;
    }

    public function lessThan(): ?string
    {
        return $this->lessThan;
    }

    public function lessThanOrEqual(): ?string
    {
        return $this->lessThanOrEqual;
    }

    /**
     * @return Collection<non-negative-int, Change>|null
     */
    public function changes(): ?Collection
    {
        return $this->changes;
    }
}
