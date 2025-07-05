<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\CreditType;

final class CreditMapper
{
    public static function mapSchemaToPersistence(Schema\Credit $schema): Persistence\Credit
    {
        $persistence = new Persistence\Credit();

        $persistence->setLanguage($schema->lang);
        $persistence->setUser($schema->user);

        if (strtolower($schema->type ?? '') === 'other') {
            $persistence->setType(CreditType::Other);
        }

        if (strtolower($schema->type ?? '') === 'finder') {
            $persistence->setType(CreditType::Finder);
        }

        if (strtolower($schema->type ?? '') === 'reporter') {
            $persistence->setType(CreditType::Reporter);
        }

        if (strtolower($schema->type ?? '') === 'analyst') {
            $persistence->setType(CreditType::Analyst);
        }

        if (strtolower($schema->type ?? '') === 'coordinator') {
            $persistence->setType(CreditType::Coordinator);
        }

        if (strtolower($schema->type ?? '') === 'remediation developer') {
            $persistence->setType(CreditType::RemediationDeveloper);
        }

        if (strtolower($schema->type ?? '') === 'remediation reviewer') {
            $persistence->setType(CreditType::RemediationReviewer);
        }

        if (strtolower($schema->type ?? '') === 'remediation verifier') {
            $persistence->setType(CreditType::RemediationVerifier);
        }

        if (strtolower($schema->type ?? '') === 'tool') {
            $persistence->setType(CreditType::Tool);
        }

        if (strtolower($schema->type ?? '') === 'sponsor') {
            $persistence->setType(CreditType::Sponsor);
        }

        $persistence->setContent($schema->value);

        return $persistence;
    }
}