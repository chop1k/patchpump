<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\CreditType;

final class CreditMapper
{
    public static function mapSchemaToPersistence(Schema\Credit $schema): Persistence\Credit
    {
        $persistence = new Persistence\Credit();

        $persistence->setLanguage($schema->lang);
        $persistence->setUser($schema->user);

        if ('other' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Other);
        }

        if ('finder' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Finder);
        }

        if ('reporter' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Reporter);
        }

        if ('analyst' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Analyst);
        }

        if ('coordinator' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Coordinator);
        }

        if ('remediation developer' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::RemediationDeveloper);
        }

        if ('remediation reviewer' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::RemediationReviewer);
        }

        if ('remediation verifier' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::RemediationVerifier);
        }

        if ('tool' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Tool);
        }

        if ('sponsor' === strtolower($schema->type ?? '')) {
            $persistence->setType(CreditType::Sponsor);
        }

        $persistence->setContent($schema->value);

        return $persistence;
    }
}
