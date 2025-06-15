<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVSS version 3.1 according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Metric
 */
final class CVSS31
{
    #[Assert\NotNull]
    #[Assert\Choice(['4.0'])]
    public ?string $version = null;

    #[Assert\NotNull]
    #[Assert\Regex('^CVSS:3[.]1/((AV:[NALP]|AC:[LH]|PR:[NLH]|UI:[NR]|S:[UC]|[CIA]:[NLH]|E:[XUPFH]|RL:[XOTWU]|RC:[XURC]|[CIA]R:[XLMH]|MAV:[XNALP]|MAC:[XLH]|MPR:[XNLH]|MUI:[XNR]|MS:[XUC]|M[CIA]:[XNLH])/)*(AV:[NALP]|AC:[LH]|PR:[NLH]|UI:[NR]|S:[UC]|[CIA]:[NLH]|E:[XUPFH]|RL:[XOTWU]|RC:[XURC]|[CIA]R:[XLMH]|MAV:[XNALP]|MAC:[XLH]|MPR:[XNLH]|MUI:[XNR]|MS:[XUC]|M[CIA]:[XNLH])$')]
    public ?string $vectorString = null;

    #[Assert\NotNull]
    #[Assert\Choice([
        0,
        0.1,
        0.2,
        0.3,
        0.4,
        0.5,
        0.6,
        0.7,
        0.8,
        0.9,
        1,
        1.1,
        1.2,
        1.3,
        1.4,
        1.5,
        1.6,
        1.7,
        1.8,
        1.9,
        2,
        2.1,
        2.2,
        2.3,
        2.4,
        2.5,
        2.6,
        2.7,
        2.8,
        2.9,
        3,
        3.1,
        3.2,
        3.3,
        3.4,
        3.5,
        3.6,
        3.7,
        3.8,
        3.9,
        4,
        4.1,
        4.2,
        4.3,
        4.4,
        4.5,
        4.6,
        4.7,
        4.8,
        4.9,
        5,
        5.1,
        5.2,
        5.3,
        5.4,
        5.5,
        5.6,
        5.7,
        5.8,
        5.9,
        6,
        6.1,
        6.2,
        6.3,
        6.4,
        6.5,
        6.6,
        6.7,
        6.8,
        6.9,
        7,
        7.1,
        7.2,
        7.3,
        7.4,
        7.5,
        7.6,
        7.7,
        7.8,
        7.9,
        8,
        8.1,
        8.2,
        8.3,
        8.4,
        8.5,
        8.6,
        8.7,
        8.8,
        8.9,
        9,
        9.1,
        9.2,
        9.3,
        9.4,
        9.5,
        9.6,
        9.7,
        9.8,
        9.9,
        10
    ])]
    public ?int $baseScore = null;

    #[Assert\NotNull]
    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL'
    ])]
    public ?string $baseSeverity = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT_NETWORK',
        'LOCAL',
        'PHYSICAL'
    ])]
    public ?string $attackVector = null;

    #[Assert\Choice([
        'HIGH',
        'LOW'
    ])]
    public ?string $attackComplexity = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
        'NONE'
    ])]
    public ?string $privilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'REQUIRED'
    ])]
    public ?string $userInteraction = null;

    #[Assert\Choice([
        'UNCHANGED',
        'CHANGED'
    ])]
    public ?string $scope = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $confidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $integrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $availabilityImpact = null;

    #[Assert\Choice([
        'UNPROVEN',
        'PROOF_OF_CONCEPT',
        'FUNCTIONAL',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $exploitCodeMaturity = null;

    #[Assert\Choice([
        'OFFICIAL_FIX',
        'TEMPORARY_FIX',
        'WORKAROUND',
        'UNAVAILABLE',
        'NOT_DEFINED'
    ])]
    public ?string $remediationLevel = null;

    #[Assert\Choice([
        'UNKNOWN',
        'REASONABLE',
        'CONFIRMED',
        'NOT_DEFINED'
    ])]
    public ?string $reportConfidence = null;

    #[Assert\Choice([
        0,
        0.1,
        0.2,
        0.3,
        0.4,
        0.5,
        0.6,
        0.7,
        0.8,
        0.9,
        1,
        1.1,
        1.2,
        1.3,
        1.4,
        1.5,
        1.6,
        1.7,
        1.8,
        1.9,
        2,
        2.1,
        2.2,
        2.3,
        2.4,
        2.5,
        2.6,
        2.7,
        2.8,
        2.9,
        3,
        3.1,
        3.2,
        3.3,
        3.4,
        3.5,
        3.6,
        3.7,
        3.8,
        3.9,
        4,
        4.1,
        4.2,
        4.3,
        4.4,
        4.5,
        4.6,
        4.7,
        4.8,
        4.9,
        5,
        5.1,
        5.2,
        5.3,
        5.4,
        5.5,
        5.6,
        5.7,
        5.8,
        5.9,
        6,
        6.1,
        6.2,
        6.3,
        6.4,
        6.5,
        6.6,
        6.7,
        6.8,
        6.9,
        7,
        7.1,
        7.2,
        7.3,
        7.4,
        7.5,
        7.6,
        7.7,
        7.8,
        7.9,
        8,
        8.1,
        8.2,
        8.3,
        8.4,
        8.5,
        8.6,
        8.7,
        8.8,
        8.9,
        9,
        9.1,
        9.2,
        9.3,
        9.4,
        9.5,
        9.6,
        9.7,
        9.8,
        9.9,
        10
    ])]
    public ?int $temporalScore = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL'
    ])]
    public ?string $temporalSeverity = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $confidentialityRequirement = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $integrityRequirement = null;

    #[Assert\Choice([
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $availabilityRequirement = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT_NETWORK',
        'LOCAL',
        'PHYSICAL',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedAttackVector = null;

    #[Assert\Choice([
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedAttackComplexity = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
        'NONE',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedPrivilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'REQUIRED',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedUserInteraction = null;

    #[Assert\Choice([
        'UNCHANGED',
        'CHANGED',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedScope = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedAvailabilityImpact = null;

    #[Assert\Choice([
        0,
        0.1,
        0.2,
        0.3,
        0.4,
        0.5,
        0.6,
        0.7,
        0.8,
        0.9,
        1,
        1.1,
        1.2,
        1.3,
        1.4,
        1.5,
        1.6,
        1.7,
        1.8,
        1.9,
        2,
        2.1,
        2.2,
        2.3,
        2.4,
        2.5,
        2.6,
        2.7,
        2.8,
        2.9,
        3,
        3.1,
        3.2,
        3.3,
        3.4,
        3.5,
        3.6,
        3.7,
        3.8,
        3.9,
        4,
        4.1,
        4.2,
        4.3,
        4.4,
        4.5,
        4.6,
        4.7,
        4.8,
        4.9,
        5,
        5.1,
        5.2,
        5.3,
        5.4,
        5.5,
        5.6,
        5.7,
        5.8,
        5.9,
        6,
        6.1,
        6.2,
        6.3,
        6.4,
        6.5,
        6.6,
        6.7,
        6.8,
        6.9,
        7,
        7.1,
        7.2,
        7.3,
        7.4,
        7.5,
        7.6,
        7.7,
        7.8,
        7.9,
        8,
        8.1,
        8.2,
        8.3,
        8.4,
        8.5,
        8.6,
        8.7,
        8.8,
        8.9,
        9,
        9.1,
        9.2,
        9.3,
        9.4,
        9.5,
        9.6,
        9.7,
        9.8,
        9.9,
        10
    ])]
    public ?int $environmentScore = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'CRITICAL'
    ])]
    public ?string $environmentSeverity = null;
}