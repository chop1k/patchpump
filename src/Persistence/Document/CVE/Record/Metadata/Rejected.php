<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Metadata;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Rejected
{
    public function __construct(
        #[ODM\Field]
        protected ?int $serial,

        #[ODM\Field]
        protected ?\DateTimeImmutable $publishedAt,

        #[ODM\Field]
        protected ?\DateTimeImmutable $reservedAt,

        #[ODM\Field]
        protected ?\DateTimeImmutable $updatedAt,

        #[ODM\Field]
        protected ?\DateTimeImmutable $rejectedAt,
    ) {
    }

    public function serial(): ?int
    {
        return $this->serial;
    }

    public function publishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function reservedAt(): ?\DateTimeImmutable
    {
        return $this->reservedAt;
    }

    public function updatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function rejectedAt(): ?\DateTimeImmutable
    {
        return $this->rejectedAt;
    }
}
