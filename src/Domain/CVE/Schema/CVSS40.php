<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVSS version 4.0 according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Metric
 */
final class CVSS40
{
    #[Assert\NotNull]
    #[Assert\IdenticalTo('4.0')]
    public ?string $version = null;

    #[Assert\NotNull]
    #[Assert\Regex('^CVSS:4[.]0/AV:[NALP]/AC:[LH]/AT:[NP]/PR:[NLH]/UI:[NPA]/VC:[HLN]/VI:[HLN]/VA:[HLN]/SC:[HLN]/SI:[HLN]/SA:[HLN](/E:[XAPU])?(/CR:[XHML])?(/IR:[XHML])?(/AR:[XHML])?(/MAV:[XNALP])?(/MAC:[XLH])?(/MAT:[XNP])?(/MPR:[XNLH])?(/MUI:[XNPA])?(/MVC:[XNLH])?(/MVI:[XNLH])?(/MVA:[XNLH])?(/MSC:[XNLH])?(/MSI:[XNLHS])?(/MSA:[XNLHS])?(/S:[XNP])?(/AU:[XNY])?(/R:[XAUI])?(/V:[XDC])?(/RE:[XLMH])?(/U:(X|Clear|Green|Amber|Red))?$')]
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
        'ADJACENT',
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
        'NONE',
        'PRESENT'
    ])]
    public ?string $attackRequirements = null;

    #[Assert\Choice([
        'HIGH',
        'LOW',
        'NONE'
    ])]
    public ?string $privilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'PASSIVE',
        'ACTIVE'
    ])]
    public ?string $userInteraction = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $vulnConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $vulnIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $vulnAvailabilityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $subConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $subIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH'
    ])]
    public ?string $subAvailabilityImpact = null;

    #[Assert\Choice([
        'UNREPORTED',
        'PROOF_OF_CONCEPT',
        'ATTACKED',
        'NOT_DEFINED'
    ])]
    public ?string $exploitMaturity = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $confidentialityRequirement = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $integrityRequirement = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $availabilityRequirement = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT',
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
        'NONE',
        'PRESENT',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedAttackRequirements = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedPrivilegesRequired = null;

    #[Assert\Choice([
        'NONE',
        'PASSIVE',
        'ACTIVE',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedUserInteraction = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedVulnConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedVulnIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedVulnAvailabilityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedSubConfidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedSubIntegrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'HIGH',
        'SAFETY',
        'NOT_DEFINED'
    ])]
    public ?string $modifiedSubAvailabilityImpact = null;

    #[Assert\Choice([
        'NEGLIGIBLE',
        'PRESENT',
        'NOT_DEFINED'
    ])]
    public ?string $SafetyType = null;

    #[Assert\Choice([
        'NO',
        'YES',
        'NOT_DEFINED'
    ])]
    public ?string $Automatable = null;

    #[Assert\Choice([
        'AUTOMATIC',
        'USER',
        'IRRECOVERABLE',
        'NOT_DEFINED'
    ])]
    public ?string $Recovery = null;

    #[Assert\Choice([
        'DIFFUSE',
        'CONCENTRATED',
        'NOT_DEFINED'
    ])]
    public ?string $valueDensity = null;

    #[Assert\Choice([
        'LOW',
        'MODERATE',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $vulnerabilityResponseEffort = null;

    #[Assert\Choice([
        'CLEAR',
        'GREEN',
        'AMBER',
        'RED',
        'NOT_DEFINED'
    ])]
    public ?string $providerUrgency = null;
}