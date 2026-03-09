<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata;

use DateTimeImmutable;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Rejected
{
    public function __construct(
        #[ODM\Field]
        protected ?int $serial = null,
        #[ODM\Field]
        protected ?DateTimeImmutable $publishedAt = null,
        #[ODM\Field]
        protected ?DateTimeImmutable $reservedAt = null,
        #[ODM\Field]
        protected ?DateTimeImmutable $updatedAt = null,
        #[ODM\Field]
        protected ?DateTimeImmutable $rejectedAt = null,
    ) {
    }

    public function serial(): ?int
    {
        return $this->serial;
    }

    public function publishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function reservedAt(): ?DateTimeImmutable
    {
        return $this->reservedAt;
    }

    public function updatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function rejectedAt(): ?DateTimeImmutable
    {
        return $this->rejectedAt;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->serial ??= null;
        $this->publishedAt ??= null;
        $this->reservedAt ??= null;
        $this->updatedAt ??= null;
        $this->rejectedAt ??= null;
    }
}
