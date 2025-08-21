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
class Status
{
    private function __construct(
        #[ODM\Field]
        protected int $status,
    ) {
    }

    public static function withAffected(): self
    {
        return new self(1);
    }

    public static function withUnaffected(): self
    {
        return new self(2);
    }

    public static function withUnknown(): self
    {
        return new self(0);
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
