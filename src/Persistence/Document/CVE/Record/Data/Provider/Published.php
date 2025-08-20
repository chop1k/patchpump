<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Data\Provider;

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
        private string $orgId,

        #[ODM\Field]
        private ?string $orgName,

        #[ODM\Field]
        private ?\DateTimeImmutable $updatedAt,

        #[ODM\Field]
        private ?\DateTimeImmutable $publicAt,

        #[ODM\Field]
        private ?\DateTimeImmutable $assignedAt,
    ) {
    }

    public function orgId(): string
    {
        return $this->orgId;
    }

    public function orgName(): ?string
    {
        return $this->orgName;
    }

    public function updatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function publicAt(): ?\DateTimeImmutable
    {
        return $this->publicAt;
    }

    public function assignedAt(): ?\DateTimeImmutable
    {
        return $this->assignedAt;
    }
}
