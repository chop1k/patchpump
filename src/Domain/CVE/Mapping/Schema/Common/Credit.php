<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema\Common;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;

/**
 * @internal
 */
final readonly class Credit
{
    public function __construct(
        private Schema\Credit $schema,
    ) {
    }

    public function toPersistence(): Persistence\Common\Credit
    {
        return new Persistence\Common\Credit(
            $this->schema->lang,
            $this->schema->value,
            $this->schema->user,
            $this->type(),
        );
    }

    private function type(): Persistence\Common\CreditType
    {
        $type = strtolower($this->schema->type ?? '');

        return match ($type) {
            'other' => Persistence\Common\CreditType::Other,
            'finder' => Persistence\Common\CreditType::Finder,
            'reporter' => Persistence\Common\CreditType::Reporter,
            'analyst' => Persistence\Common\CreditType::Analyst,
            'coordinator' => Persistence\Common\CreditType::Coordinator,
            'remediation developer' => Persistence\Common\CreditType::RemediationDeveloper,
            'remediation reviewer' => Persistence\Common\CreditType::RemediationReviewer,
            'remediation verifier' => Persistence\Common\CreditType::RemediationVerifier,
            'tool' => Persistence\Common\CreditType::Tool,
            'sponsor' => Persistence\Common\CreditType::Sponsor,
            default => null,
        };
    }
}
