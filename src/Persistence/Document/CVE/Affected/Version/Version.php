<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected\Version;

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
        private int $status,

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

    /**
     * @param Collection<non-negative-int, Change>|null $changes
     */
    public static function withAffected(
        string $version,
        ?string $type,
        ?string $lessThan,
        ?string $lessThanOrEqual,
        ?Collection $changes,
    ): self {
        return new self($version, 1, $type, $lessThan, $lessThanOrEqual, $changes);
    }

    /**
     * @param Collection<non-negative-int, Change>|null $changes
     */
    public static function withUnaffected(
        string $version,
        ?string $type,
        ?string $lessThan,
        ?string $lessThanOrEqual,
        ?Collection $changes,
    ): self {
        return new self($version, 2, $type, $lessThan, $lessThanOrEqual, $changes);
    }

    /**
     * @param Collection<non-negative-int, Change>|null $changes
     */
    public static function withUnknown(
        string $version,
        ?string $type,
        ?string $lessThan,
        ?string $lessThanOrEqual,
        ?Collection $changes,
    ): self {
        return new self($version, 0, $type, $lessThan, $lessThanOrEqual, $changes);
    }

    public function version(): string
    {
        return $this->version;
    }

    public function affected(): bool
    {
        return 1 === $this->status;
    }

    public function unaffected(): bool
    {
        return 2 === $this->status;
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
