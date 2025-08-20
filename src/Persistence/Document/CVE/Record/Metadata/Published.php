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
class Published
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
}
