<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Record\Metadata\Assigner;

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
        protected string $orgId,

        #[ODM\Field]
        protected ?string $orgName,
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
}
