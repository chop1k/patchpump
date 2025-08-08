<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\CreditType;

final readonly class Credit
{
    public function __construct(
        private Schema\Credit $schema,
    ) {
    }

    public function toPersistence(): Persistence\Credit
    {
        $persistence = new Persistence\Credit();

        $persistence->setLanguage($this->schema->lang);
        $persistence->setUser($this->schema->user);

        $type = strtolower($this->schema->type ?? '');

        $persistence->setType(
            match ($type) {
                'other' => CreditType::Other,
                'finder' => CreditType::Finder,
                'reporter' => CreditType::Reporter,
                'analyst' => CreditType::Analyst,
                'coordinator' => CreditType::Coordinator,
                'remediation developer' => CreditType::RemediationDeveloper,
                'remediation reviewer' => CreditType::RemediationReviewer,
                'remediation verifier' => CreditType::RemediationVerifier,
                'tool' => CreditType::Tool,
                'sponsor' => CreditType::Sponsor,
                default => null,
            }
        );

        $persistence->setContent($this->schema->value);

        return $persistence;
    }
}
