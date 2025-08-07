<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CVSS20;

final class CVSS20Provider
{
    public const VECTOR = 'AV:N/AC:L/Au:N/C:P/I:P/A:C';

    /**
     * @return CVSS20[]
     */
    public static function provideValid(): array
    {
        $cvss_0 = new CVSS20();

        $cvss_0->version = '2.0';
        $cvss_0->baseScore = 2;
        $cvss_0->vectorString = self::VECTOR;

        $cvss_1 = new CVSS20();

        $cvss_1->version = '2.0';
        $cvss_1->baseScore = 2;
        $cvss_1->vectorString = self::VECTOR;
        $cvss_1->accessVector = 'NETWORK';

        $cvss_2 = new CVSS20();

        $cvss_2->version = '2.0';
        $cvss_2->baseScore = 2;
        $cvss_2->vectorString = self::VECTOR;
        $cvss_2->accessComplexity = 'HIGH';

        $cvss_3 = new CVSS20();

        $cvss_3->version = '2.0';
        $cvss_3->baseScore = 2;
        $cvss_3->vectorString = self::VECTOR;
        $cvss_3->authentication = 'MULTIPLE';

        $cvss_4 = new CVSS20();

        $cvss_4->version = '2.0';
        $cvss_4->baseScore = 2;
        $cvss_4->vectorString = self::VECTOR;
        $cvss_4->confidentialityImpact = 'NONE';

        $cvss_5 = new CVSS20();

        $cvss_5->version = '2.0';
        $cvss_5->baseScore = 2;
        $cvss_5->vectorString = self::VECTOR;
        $cvss_5->integrityImpact = 'NONE';

        $cvss_6 = new CVSS20();

        $cvss_6->version = '2.0';
        $cvss_6->baseScore = 2;
        $cvss_6->vectorString = self::VECTOR;
        $cvss_6->availabilityImpact = 'NONE';

        $cvss_7 = new CVSS20();

        $cvss_7->version = '2.0';
        $cvss_7->baseScore = 2;
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->exploitability = 'FUNCTIONAL';

        $cvss_8 = new CVSS20();

        $cvss_8->version = '2.0';
        $cvss_8->baseScore = 2;
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->remediationLevel = 'WORKAROUND';

        $cvss_9 = new CVSS20();

        $cvss_9->version = '2.0';
        $cvss_9->baseScore = 2;
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->reportConfidence = 'UNCONFIRMED';

        $cvss_10 = new CVSS20();

        $cvss_10->version = '2.0';
        $cvss_10->baseScore = 2;
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->temporalScore = 4;

        $cvss_11 = new CVSS20();

        $cvss_11->version = '2.0';
        $cvss_11->baseScore = 2;
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->collateralDamagePotential = 'HIGH';

        $cvss_12 = new CVSS20();

        $cvss_12->version = '2.0';
        $cvss_12->baseScore = 2;
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->targetDistribution = 'NOT_DEFINED';

        $cvss_13 = new CVSS20();

        $cvss_13->version = '2.0';
        $cvss_13->baseScore = 2;
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->confidentialityRequirement = 'LOW';

        $cvss_14 = new CVSS20();

        $cvss_14->version = '2.0';
        $cvss_14->baseScore = 2;
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->integrityRequirement = 'HIGH';

        $cvss_15 = new CVSS20();

        $cvss_15->version = '2.0';
        $cvss_15->baseScore = 2;
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->availabilityRequirement = 'MEDIUM';

        $cvss_16 = new CVSS20();

        $cvss_16->version = '2.0';
        $cvss_16->baseScore = 2;
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->environmentScore = 2;

        $cvss_17 = new CVSS20();

        $cvss_17->version = '2.0';
        $cvss_17->baseScore = 2;
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->environmentScore = 2.1244;

        $cvss_18 = new CVSS20();

        $cvss_18->version = '2.0';
        $cvss_18->baseScore = 2;
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->temporalScore = 2.1244;

        return [
            $cvss_0,
            $cvss_1,
            $cvss_2,
            $cvss_3,
            $cvss_4,
            $cvss_5,
            $cvss_6,
            $cvss_7,
            $cvss_8,
            $cvss_9,
            $cvss_10,
            $cvss_11,
            $cvss_12,
            $cvss_13,
            $cvss_14,
            $cvss_15,
            $cvss_16,
            $cvss_17,
            $cvss_18,
        ];
    }

    /**
     * @return CVSS20[]
     */
    public static function provideInvalid(): array
    {
        $cvss_0 = new CVSS20();

        $cvss_0->version = '3.0';
        $cvss_0->baseScore = 2;
        $cvss_0->vectorString = self::VECTOR;

        $cvss_1 = new CVSS20();

        $cvss_1->version = '2.0';
        $cvss_1->baseScore = 11;
        $cvss_1->vectorString = self::VECTOR;

        $cvss_2 = new CVSS20();

        $cvss_2->version = '2.0';
        $cvss_2->baseScore = 2;
        $cvss_2->vectorString = '123';

        $cvss_3 = new CVSS20();

        $cvss_3->version = '2.0';
        $cvss_3->baseScore = 2;
        $cvss_3->vectorString = null;

        $cvss_4 = new CVSS20();

        $cvss_4->version = '2.0';
        $cvss_4->baseScore = null;
        $cvss_4->vectorString = self::VECTOR;

        $cvss_5 = new CVSS20();

        $cvss_5->version = null;
        $cvss_5->baseScore = 2;
        $cvss_5->vectorString = self::VECTOR;

        $cvss_6 = new CVSS20();

        $cvss_6->version = '2.0';
        $cvss_6->baseScore = 2;
        $cvss_6->vectorString = self::VECTOR;
        $cvss_6->accessVector = '123';

        $cvss_7 = new CVSS20();

        $cvss_7->version = '2.0';
        $cvss_7->baseScore = 2;
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->accessComplexity = '123';

        $cvss_8 = new CVSS20();

        $cvss_8->version = '2.0';
        $cvss_8->baseScore = 2;
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->authentication = '123';

        $cvss_9 = new CVSS20();

        $cvss_9->version = '2.0';
        $cvss_9->baseScore = 2;
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->confidentialityImpact = '123';

        $cvss_10 = new CVSS20();

        $cvss_10->version = '2.0';
        $cvss_10->baseScore = 2;
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->integrityImpact = '123';

        $cvss_11 = new CVSS20();

        $cvss_11->version = '2.0';
        $cvss_11->baseScore = 2;
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->availabilityImpact = '123';

        $cvss_12 = new CVSS20();

        $cvss_12->version = '2.0';
        $cvss_12->baseScore = 2;
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->exploitability = '123';

        $cvss_13 = new CVSS20();

        $cvss_13->version = '2.0';
        $cvss_13->baseScore = 2;
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->remediationLevel = '123';

        $cvss_14 = new CVSS20();

        $cvss_14->version = '2.0';
        $cvss_14->baseScore = 2;
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->reportConfidence = '123';

        $cvss_15 = new CVSS20();

        $cvss_15->version = '2.0';
        $cvss_15->baseScore = 2;
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->temporalScore = 11;

        $cvss_16 = new CVSS20();

        $cvss_16->version = '2.0';
        $cvss_16->baseScore = 2;
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->collateralDamagePotential = '123';

        $cvss_17 = new CVSS20();

        $cvss_17->version = '2.0';
        $cvss_17->baseScore = 2;
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->targetDistribution = '123';

        $cvss_18 = new CVSS20();

        $cvss_18->version = '2.0';
        $cvss_18->baseScore = 2;
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->confidentialityRequirement = '123';

        $cvss_19 = new CVSS20();

        $cvss_19->version = '2.0';
        $cvss_19->baseScore = 2;
        $cvss_19->vectorString = self::VECTOR;
        $cvss_19->integrityRequirement = '123';

        $cvss_20 = new CVSS20();

        $cvss_20->version = '2.0';
        $cvss_20->baseScore = 2;
        $cvss_20->vectorString = self::VECTOR;
        $cvss_20->availabilityRequirement = '123';

        $cvss_21 = new CVSS20();

        $cvss_21->version = '2.0';
        $cvss_21->baseScore = 2;
        $cvss_21->vectorString = self::VECTOR;
        $cvss_21->environmentScore = 20;

        return [
            $cvss_0,
            $cvss_1,
            $cvss_2,
            $cvss_3,
            $cvss_4,
            $cvss_5,
            $cvss_6,
            $cvss_7,
            $cvss_8,
            $cvss_9,
            $cvss_10,
            $cvss_11,
            $cvss_12,
            $cvss_13,
            $cvss_14,
            $cvss_15,
            $cvss_16,
            $cvss_17,
            $cvss_18,
            $cvss_19,
            $cvss_20,
            $cvss_21,
        ];
    }
}
