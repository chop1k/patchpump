<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVSS version 3.1 according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @see https://github.com/CVEProject/cve-schema
 * @see https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 * @see Metric
 */
final class CVSS31
{
    #[Assert\NotNull]
    #[Assert\IdenticalTo('3.1')]
    public ?string $version = null;

    #[Assert\NotNull]
    #[Assert\Regex('^CVSS:3[.]1/((AV:[NALP]|AC:[LH]|PR:[NLH]|UI:[NR]|S:[UC]|[CIA]:[NLH]|E:[XUPFH]|RL:[XOTWU]|RC:[XURC]|[CIA]R:[XLMH]|MAV:[XNALP]|MAC:[XLH]|MPR:[XNLH]|MUI:[XNR]|MS:[XUC]|M[CIA]:[XNLH])/)*(AV:[NALP]|AC:[LH]|PR:[NLH]|UI:[NR]|S:[UC]|[CIA]:[NLH]|E:[XUPFH]|RL:[XOTWU]|RC:[XURC]|[CIA]R:[XLMH]|MAV:[XNALP]|MAC:[XLH]|MPR:[XNLH]|MUI:[XNR]|MS:[XUC]|M[CIA]:[XNLH])$^')]
    public ?string $vectorString = null;

    #[Assert\NotNull]
    #[Assert\Range(min: 0, max: 10)]
    #[Assert\DivisibleBy(0.1)]
    public ?float $baseScore = null;

    #[Assert\NotNull]
    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL',
    ])]
    public ?string $baseSeverity = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT_NETWORK',
        'LOCAL',
        'PHYSICAL',
    ])]
    public ?string $attackVector = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
    ])]
    public ?string $attackComplexity = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
        'NONE',
    ])]
    public ?string $privilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'REQUIRED',
    ])]
    public ?string $userInteraction = null;

    #[Assert\Choice([
        'UNCHANGED',
        'CHANGED',
    ])]
    public ?string $scope = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
    ])]
    public ?string $confidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
    ])]
    public ?string $integrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
    ])]
    public ?string $availabilityImpact = null;

    #[Assert\Choice([
        'UNPROVEN',
        'PROOF_OF_CONCEPT',
        'FUNCTIONAL',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $exploitCodeMaturity = null;

    #[Assert\Choice([
        'OFFICIAL_FIX',
        'TEMPORARY_FIX',
        'WORKAROUND',
        'UNAVAILABLE',
        'NOT_DEFINED',
    ])]
    public ?string $remediationLevel = null;

    #[Assert\Choice([
        'UNKNOWN',
        'REASONABLE',
        'CONFIRMED',
        'NOT_DEFINED',
    ])]
    public ?string $reportConfidence = null;

    #[Assert\Range(min: 0, max: 10)]
    #[Assert\DivisibleBy(0.1)]
    public ?float $temporalScore = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL',
    ])]
    public ?string $temporalSeverity = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $confidentialityRequirement = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $integrityRequirement = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $availabilityRequirement = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT_NETWORK',
        'LOCAL',
        'PHYSICAL',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedAttackVector = null;

    #[Assert\Choice([
        'LOW',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedAttackComplexity = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
        'NONE',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedPrivilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'REQUIRED',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedUserInteraction = null;

    #[Assert\Choice([
        'UNCHANGED',
        'CHANGED',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedScope = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED',
    ])]
    public ?string $modifiedAvailabilityImpact = null;

    #[Assert\Range(min: 0, max: 10)]
    #[Assert\DivisibleBy(0.1)]
    public ?float $environmentScore = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL',
    ])]
    public ?string $environmentSeverity = null;
}
