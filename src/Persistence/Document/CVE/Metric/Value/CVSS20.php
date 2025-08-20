<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Metric\Value;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @psalm-type
 */
#[ODM\EmbeddedDocument]
class CVSS20
{
    //    public function __construct(
    //        /**
    //         * @var float<0, 10> $baseScore
    //         */
    //        private readonly float $baseScore,
    //
    //        /**
    //         * @var "LOCAL"|"NETWORK"|"ADJACENT_NETWORK"|null $accessVector
    //         */
    //        private readonly ?string $accessVector,
    //
    //        /**
    //         * @var "LOW"|"MEDIUM"|"HIGH"|null $accessComplexity
    //         */
    //        private readonly ?string $accessComplexity,
    //
    //        /**
    //         * @var "NONE"|"SINGLE"|"MULTIPLE"|null $authentication
    //         */
    //        private readonly ?string $authentication,
    //
    //        /**
    //         * @var "NONE"|"PARTIAL"|"COMPLETE"|null $confidentialityImpact
    //         */
    //        private readonly ?string $confidentialityImpact,
    //
    //        /**
    //         * @var "NONE"|"PARTIAL"|"COMPLETE"|null $integrityImpact
    //         */
    //        private readonly ?string $integrityImpact,
    //
    //        /**
    //         * @var "NONE"|"PARTIAL"|"COMPLETE"|null $availabilityImpact
    //         */
    //        private readonly ?string $availabilityImpact,
    //
    //        /**
    //         * @var "UNPROVEN"|"PROOF_OF_CONCEPT"|"FUNCTIONAL"|"HIGH"|"NOT_DEFINED"|null $exploitability
    //         */
    //        private readonly ?string $exploitability,
    //
    //        /**
    //         * @var "OFFICIAL_FIX"|"TEMPORARY_FIX"|"WORKAROUND"|"UNAVAILABLE"|"NOT_DEFINED"|null $remediationLevel
    //         */
    //        private readonly ?string $remediationLevel,
    //
    //        /**
    //         * @var "UNCONFIRMED"|"UNCORROBORATED"|"CONFIRMED"|"NOT_DEFINED"|null $reportConfidence
    //         */
    //        private readonly ?string $reportConfidence,
    //
    //        /**
    //         * @var float<0, 10>|null $temporalScore
    //         */
    //        private readonly ?float $temporalScore,
    //
    //        /**
    //         * @var "NONE"|"LOW"|"LOW_MEDIUM"|"MEDIUM_HIGH"|"HIGH"|"NOT_DEFINED"|null $collateralDamagePotential
    //         */
    //        private readonly ?string $collateralDamagePotential,
    //
    //        /**
    //         * @var "NONE"|"LOW"|"MEDIUM"|"HIGH"|"NOT_DEFINED"|null $targetDistribution
    //         */
    //        private readonly ?string $targetDistribution,
    //
    //        /**
    //         * @var "LOW"|"MEDIUM"|"HIGH"|"NOT_DEFINED"|null $confidentialityRequirement
    //         */
    //        private readonly ?string $confidentialityRequirement,
    //
    //        /**
    //         * @var "LOW"|"MEDIUM"|"HIGH"|"NOT_DEFINED"|null $integrityRequirement
    //         */
    //        private readonly ?string $integrityRequirement,
    //
    //        /**
    //         * @var "LOW"|"MEDIUM"|"HIGH"|"NOT_DEFINED"|null $availabilityRequirement
    //         */
    //        private readonly ?string $availabilityRequirement,
    //
    //        /**
    //         * @var float<0, 10>|null $environmentScore
    //         */
    //        private readonly ?float $environmentScore,
    //    ) {
    //    }
    //
    //    public function baseScore(): float
    //    {
    //        return $this->baseScore;
    //    }
    //
    //    public function accessVector(): ?string
    //    {
    //        return $this->accessVector;
    //    }
    //
    //    public function accessComplexity(): ?string
    //    {
    //        return $this->accessComplexity;
    //    }
    //
    //    public function authentication(): ?string
    //    {
    //        return $this->authentication;
    //    }
    //
    //    public function confidentialityImpact(): ?string
    //    {
    //        return $this->confidentialityImpact;
    //    }
    //
    //    public function integrityImpact(): ?string
    //    {
    //        return $this->integrityImpact;
    //    }
    //
    //    public function availabilityImpact(): ?string
    //    {
    //        return $this->availabilityImpact;
    //    }
    //
    //    public function exploitability(): ?string
    //    {
    //        return $this->exploitability;
    //    }
    //
    //    public function remediationLevel(): ?string
    //    {
    //        return $this->remediationLevel;
    //    }
    //
    //    public function reportConfidence(): ?string
    //    {
    //        return $this->reportConfidence;
    //    }
    //
    //    public function temporalScore(): ?float
    //    {
    //        return $this->temporalScore;
    //    }
    //
    //    public function collateralDamagePotential(): ?string
    //    {
    //        return $this->collateralDamagePotential;
    //    }
    //
    //    public function targetDistribution(): ?string
    //    {
    //        return $this->targetDistribution;
    //    }
    //
    //    public function confidentialityRequirement(): ?string
    //    {
    //        return $this->confidentialityRequirement;
    //    }
    //
    //    public function integrityRequirement(): ?string
    //    {
    //        return $this->integrityRequirement;
    //    }
    //
    //    public function availabilityRequirement(): ?string
    //    {
    //        return $this->availabilityRequirement;
    //    }
    //
    //    public function environmentScore(): ?float
    //    {
    //        return $this->environmentScore;
    //    }
}
