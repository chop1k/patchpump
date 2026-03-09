<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Affected\Version;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Version
{
    private function __construct(
        #[ODM\Field]
        private string $version,
        #[ODM\Field]
        private int $status,
        #[ODM\Field]
        private ?string $type = null,
        #[ODM\Field]
        private ?string $lessThan = null,
        #[ODM\Field]
        private ?string $lessThanOrEqual = null,

        /**
         * @var Collection<non-negative-int, Change>|null $changes
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'version_change' => Change::class,
            ]
        )]
        private ?Collection $changes = null,
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

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->type ??= null;
        $this->lessThan ??= null;
        $this->lessThanOrEqual ??= null;
        $this->changes ??= null;
    }
}
