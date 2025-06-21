<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class that represents CVSS version 2.0 according to MITRE CVE V5 schema.
 *
 * Objects of the class are used for validating CVE schema and serialization/deserialization.
 *
 * @link https://github.com/CVEProject/cve-schema
 * @link https://github.com/CVEProject/cve-schema/blob/main/schema/docs/CVE_Record_Format_bundled.json
 *
 * @see Metric
 */
final class CVSS20
{
    #[Assert\NotNull]
    #[Assert\IdenticalTo('2.0')]
    public ?string $version = null;

    #[Assert\NotNull]
    #[Assert\Regex('^((AV:[NAL]|AC:[LMH]|Au:[MSN]|[CIA]:[NPC]|E:(U|POC|F|H|ND)|RL:(OF|TF|W|U|ND)|RC:(UC|UR|C|ND)|CDP:(N|L|LM|MH|H|ND)|TD:(N|L|M|H|ND)|[CIA]R:(L|M|H|ND))/)*(AV:[NAL]|AC:[LMH]|Au:[MSN]|[CIA]:[NPC]|E:(U|POC|F|H|ND)|RL:(OF|TF|W|U|ND)|RC:(UC|UR|C|ND)|CDP:(N|L|LM|MH|H|ND)|TD:(N|L|M|H|ND)|[CIA]R:(L|M|H|ND))$^')]
    public ?string $vectorString = null;

    #[Assert\NotNull]
    #[Assert\Range(min: 0, max: 10)]
    public ?int $baseScore = null;

    #[Assert\Choice([
        'NETWORK',
        'ADJACENT_NETWORK',
        'LOCAL',
    ])]
    public ?string $accessVector = null;


    #[Assert\Choice([
        'HIGH',
        'MEDIUM',
        'LOW'
    ])]
    public ?string $accessComplexity = null;

    #[Assert\Choice([
        'MULTIPLE',
        'SINGLE',
        'NONE'
    ])]
    public ?string $authentication = null;

    #[Assert\Choice([
        'NONE',
        'PARTIAL',
        'COMPLETE'
    ])]
    public ?string $confidentialityImpact = null;

    #[Assert\Choice([
        'NONE',
        'PARTIAL',
        'COMPLETE'
    ])]
    public ?string $integrityImpact = null;

    #[Assert\Choice([
        'NONE',
        'PARTIAL',
        'COMPLETE'
    ])]
    public ?string $availabilityImpact = null;

    #[Assert\Choice([
        'UNPROVEN',
        'PROOF_OF_CONCEPT',
        'FUNCTIONAL',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $exploitability = null;

    #[Assert\Choice([
        'OFFICIAL_FIX',
        'TEMPORARY_FIX',
        'WORKAROUND',
        'UNAVAILABLE',
        'NOT_DEFINED'
    ])]
    public ?string $remediationLevel = null;

    #[Assert\Choice([
        'UNCONFIRMED',
        'UNCORROBORATED',
        'CONFIRMED',
        'NOT_DEFINED'
    ])]
    public ?string $reportConfidence = null;

    #[Assert\Range(min: 0, max: 10)]
    public ?int $temporalScore = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'LOW_MEDIUM',
        'MEDIUM_HIGH',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $collateralDamagePotential = null;

    #[Assert\Choice([
        'NONE',
        'LOW',
        'MEDIUM',
        'HIGH',
        'NOT_DEFINED'
    ])]
    public ?string $targetDistribution = null;

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

    #[Assert\Range(min: 0, max: 10)]
    public ?int $environmentScore = null;
}