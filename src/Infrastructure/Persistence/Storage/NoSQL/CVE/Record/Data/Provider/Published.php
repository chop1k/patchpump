<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Provider;

use DateTimeImmutable;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
#[ODM\HasLifecycleCallbacks]
class Published
{
    public function __construct(
        #[ODM\Field]
        private string $orgId,
        #[ODM\Field]
        private ?string $orgName = null,
        #[ODM\Field]
        private ?DateTimeImmutable $updatedAt = null,
        #[ODM\Field]
        private ?DateTimeImmutable $publicAt = null,
        #[ODM\Field]
        private ?DateTimeImmutable $assignedAt = null,
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

    public function updatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function publicAt(): ?DateTimeImmutable
    {
        return $this->publicAt;
    }

    public function assignedAt(): ?DateTimeImmutable
    {
        return $this->assignedAt;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->orgName ??= null;
        $this->updatedAt ??= null;
        $this->publicAt ??= null;
        $this->assignedAt ??= null;
    }
}
