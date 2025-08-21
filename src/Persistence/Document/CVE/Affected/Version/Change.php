<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Affected\Version;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Change
{
    private function __construct(
        #[ODM\Field]
        private string $at,

        #[ODM\Field]
        private int $status,
    ) {
    }

    public static function withAffected(string $at): self
    {
        return new self($at, 1);
    }

    public static function withUnaffected(string $at): self
    {
        return new self($at, 2);
    }

    public static function withUnknown(string $at): self
    {
        return new self($at, 0);
    }

    public function at(): string
    {
        return $this->at;
    }

    public function affected(): bool
    {
        return 1 === $this->status;
    }

    public function unaffected(): bool
    {
        return 2 === $this->status;
    }
}
