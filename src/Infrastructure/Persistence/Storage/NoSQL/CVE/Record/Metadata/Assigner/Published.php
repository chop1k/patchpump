<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner;

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
        private ?string $userId = null,
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

    public function userId(): ?string
    {
        return $this->userId;
    }

    /**
     * Because doctrine doesn't invoke the constructor, so values without a value will be uninitialized.
     */
    #[ODM\PostLoad]
    public function postLoad(): void
    {
        $this->orgName ??= null;
        $this->userId ??= null;
    }
}
