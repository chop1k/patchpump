<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CVSS31;

class CVSS31Provider
{
    public const VECTOR = 'CVSS:3.1/AV:N/AC:L/PR:N/UI:R/S:C/C:L/I:L/A:L';

    /**
     * @return CVSS31[]
     */
    public static function provideValid(): array
    {
        $cvss_0 = new CVSS31();

        $cvss_0->version = '3.1';
        $cvss_0->baseScore = 2.1;
        $cvss_0->vectorString = self::VECTOR;
        $cvss_0->baseSeverity = 'LOW';

        $cvss_1 = new CVSS31();

        $cvss_1->version = '3.1';
        $cvss_1->baseScore = 2;
        $cvss_1->vectorString = self::VECTOR;
        $cvss_1->baseSeverity = 'LOW';

        $cvss_2 = new CVSS31();

        $cvss_2->version = '3.1';
        $cvss_2->baseScore = 2;
        $cvss_2->vectorString = self::VECTOR;
        $cvss_2->baseSeverity = 'LOW';
        $cvss_2->attackVector = 'NETWORK';

        $cvss_3 = new CVSS31();

        $cvss_3->version = '3.1';
        $cvss_3->baseScore = 2;
        $cvss_3->vectorString = self::VECTOR;
        $cvss_3->baseSeverity = 'LOW';
        $cvss_3->attackComplexity = 'LOW';

        $cvss_4 = new CVSS31();

        $cvss_4->version = '3.1';
        $cvss_4->baseScore = 2;
        $cvss_4->vectorString = self::VECTOR;
        $cvss_4->baseSeverity = 'LOW';
        $cvss_4->privilegesRequired = 'LOW';

        $cvss_5 = new CVSS31();

        $cvss_5->version = '3.1';
        $cvss_5->baseScore = 2;
        $cvss_5->vectorString = self::VECTOR;
        $cvss_5->baseSeverity = 'LOW';
        $cvss_5->userInteraction = 'NONE';

        $cvss_6 = new CVSS31();

        $cvss_6->version = '3.1';
        $cvss_6->baseScore = 2;
        $cvss_6->vectorString = self::VECTOR;
        $cvss_6->baseSeverity = 'LOW';
        $cvss_6->scope = 'UNCHANGED';

        $cvss_7 = new CVSS31();

        $cvss_7->version = '3.1';
        $cvss_7->baseScore = 2;
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->baseSeverity = 'LOW';
        $cvss_7->confidentialityImpact = 'LOW';

        $cvss_8 = new CVSS31();

        $cvss_8->version = '3.1';
        $cvss_8->baseScore = 2;
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->baseSeverity = 'LOW';
        $cvss_8->integrityImpact = 'LOW';

        $cvss_9 = new CVSS31();

        $cvss_9->version = '3.1';
        $cvss_9->baseScore = 2;
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->baseSeverity = 'LOW';
        $cvss_9->availabilityImpact = 'LOW';

        $cvss_10 = new CVSS31();

        $cvss_10->version = '3.1';
        $cvss_10->baseScore = 2;
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->baseSeverity = 'LOW';
        $cvss_10->exploitCodeMaturity = 'HIGH';

        $cvss_11 = new CVSS31();

        $cvss_11->version = '3.1';
        $cvss_11->baseScore = 2;
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->baseSeverity = 'LOW';
        $cvss_11->remediationLevel = 'OFFICIAL_FIX';

        $cvss_12 = new CVSS31();

        $cvss_12->version = '3.1';
        $cvss_12->baseScore = 2;
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->baseSeverity = 'LOW';
        $cvss_12->reportConfidence = 'CONFIRMED';

        $cvss_13 = new CVSS31();

        $cvss_13->version = '3.1';
        $cvss_13->baseScore = 2;
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->baseSeverity = 'LOW';
        $cvss_13->temporalScore = 2;

        $cvss_14 = new CVSS31();

        $cvss_14->version = '3.1';
        $cvss_14->baseScore = 2;
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->baseSeverity = 'LOW';
        $cvss_14->temporalScore = 2.2;

        $cvss_15 = new CVSS31();

        $cvss_15->version = '3.1';
        $cvss_15->baseScore = 2;
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->baseSeverity = 'LOW';
        $cvss_15->temporalScore = 0;

        $cvss_16 = new CVSS31();

        $cvss_16->version = '3.1';
        $cvss_16->baseScore = 2;
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->baseSeverity = 'LOW';
        $cvss_16->temporalSeverity = 'LOW';

        $cvss_17 = new CVSS31();

        $cvss_17->version = '3.1';
        $cvss_17->baseScore = 2;
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->baseSeverity = 'LOW';
        $cvss_17->confidentialityRequirement = 'NOT_DEFINED';

        $cvss_18 = new CVSS31();

        $cvss_18->version = '3.1';
        $cvss_18->baseScore = 2;
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->baseSeverity = 'LOW';
        $cvss_18->integrityRequirement = 'NOT_DEFINED';

        $cvss_19 = new CVSS31();

        $cvss_19->version = '3.1';
        $cvss_19->baseScore = 2;
        $cvss_19->vectorString = self::VECTOR;
        $cvss_19->baseSeverity = 'LOW';
        $cvss_19->availabilityRequirement = 'NOT_DEFINED';

        $cvss_20 = new CVSS31();

        $cvss_20->version = '3.1';
        $cvss_20->baseScore = 2;
        $cvss_20->vectorString = self::VECTOR;
        $cvss_20->baseSeverity = 'LOW';
        $cvss_20->modifiedAttackVector = 'LOCAL';

        $cvss_21 = new CVSS31();

        $cvss_21->version = '3.1';
        $cvss_21->baseScore = 2;
        $cvss_21->vectorString = self::VECTOR;
        $cvss_21->baseSeverity = 'LOW';
        $cvss_21->modifiedAttackComplexity = 'LOW';

        $cvss_22 = new CVSS31();

        $cvss_22->version = '3.1';
        $cvss_22->baseScore = 2;
        $cvss_22->vectorString = self::VECTOR;
        $cvss_22->baseSeverity = 'LOW';
        $cvss_22->modifiedPrivilegesRequired = 'NONE';

        $cvss_23 = new CVSS31();

        $cvss_23->version = '3.1';
        $cvss_23->baseScore = 2;
        $cvss_23->vectorString = self::VECTOR;
        $cvss_23->baseSeverity = 'LOW';
        $cvss_23->modifiedUserInteraction = 'NONE';

        $cvss_24 = new CVSS31();

        $cvss_24->version = '3.1';
        $cvss_24->baseScore = 2;
        $cvss_24->vectorString = self::VECTOR;
        $cvss_24->baseSeverity = 'LOW';
        $cvss_24->modifiedScope = 'CHANGED';

        $cvss_25 = new CVSS31();

        $cvss_25->version = '3.1';
        $cvss_25->baseScore = 2;
        $cvss_25->vectorString = self::VECTOR;
        $cvss_25->baseSeverity = 'LOW';
        $cvss_25->modifiedConfidentialityImpact = 'HIGH';

        $cvss_26 = new CVSS31();

        $cvss_26->version = '3.1';
        $cvss_26->baseScore = 2;
        $cvss_26->vectorString = self::VECTOR;
        $cvss_26->baseSeverity = 'LOW';
        $cvss_26->modifiedIntegrityImpact = 'NOT_DEFINED';

        $cvss_27 = new CVSS31();

        $cvss_27->version = '3.1';
        $cvss_27->baseScore = 2;
        $cvss_27->vectorString = self::VECTOR;
        $cvss_27->baseSeverity = 'LOW';
        $cvss_27->modifiedAvailabilityImpact = 'NOT_DEFINED';

        $cvss_28 = new CVSS31();

        $cvss_28->version = '3.1';
        $cvss_28->baseScore = 2;
        $cvss_28->vectorString = self::VECTOR;
        $cvss_28->baseSeverity = 'LOW';
        $cvss_28->modifiedAvailabilityImpact = 'NOT_DEFINED';

        $cvss_29 = new CVSS31();

        $cvss_29->version = '3.1';
        $cvss_29->baseScore = 2;
        $cvss_29->vectorString = self::VECTOR;
        $cvss_29->baseSeverity = 'LOW';
        $cvss_29->environmentScore = 2;

        $cvss_30 = new CVSS31();

        $cvss_30->version = '3.1';
        $cvss_30->baseScore = 2;
        $cvss_30->vectorString = self::VECTOR;
        $cvss_30->baseSeverity = 'LOW';
        $cvss_30->environmentScore = 2.2;

        $cvss_31 = new CVSS31();

        $cvss_31->version = '3.1';
        $cvss_31->baseScore = 2;
        $cvss_31->vectorString = self::VECTOR;
        $cvss_31->baseSeverity = 'LOW';
        $cvss_31->environmentScore = 0;

        $cvss_32 = new CVSS31();

        $cvss_32->version = '3.1';
        $cvss_32->baseScore = 2;
        $cvss_32->vectorString = self::VECTOR;
        $cvss_32->baseSeverity = 'LOW';
        $cvss_32->environmentSeverity = 'CRITICAL';

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
            $cvss_22,
            $cvss_23,
            $cvss_24,
            $cvss_25,
            $cvss_26,
            $cvss_27,
            $cvss_28,
            $cvss_29,
            $cvss_30,
            $cvss_31,
            $cvss_32,
        ];
    }

    /**
     * @return CVSS31[]
     */
    public static function provideInvalid(): array
    {
        $cvss_0 = new CVSS31();

        $cvss_0->version = '3.0';
        $cvss_0->baseScore = 2;
        $cvss_0->vectorString = self::VECTOR;
        $cvss_0->baseSeverity = 'LOW';

        $cvss_1 = new CVSS31();

        $cvss_1->version = '3.1';
        $cvss_1->baseScore = 2.12;
        $cvss_1->vectorString = self::VECTOR;
        $cvss_1->baseSeverity = 'LOW';

        $cvss_2 = new CVSS31();

        $cvss_2->version = '3.1';
        $cvss_2->baseScore = 2;
        $cvss_2->vectorString = '123';
        $cvss_2->baseSeverity = 'LOW';

        $cvss_3 = new CVSS31();

        $cvss_3->version = '3.1';
        $cvss_3->baseScore = 2;
        $cvss_3->vectorString = '123';
        $cvss_3->baseSeverity = 'LOW';

        $cvss_4 = new CVSS31();

        $cvss_4->version = null;
        $cvss_4->baseScore = 2;
        $cvss_4->vectorString = self::VECTOR;
        $cvss_4->baseSeverity = 'LOW';

        $cvss_5 = new CVSS31();

        $cvss_5->version = '3.1';
        $cvss_5->baseScore = null;
        $cvss_5->vectorString = self::VECTOR;
        $cvss_5->baseSeverity = 'LOW';

        $cvss_6 = new CVSS31();

        $cvss_6->version = '3.1';
        $cvss_6->baseScore = 2;
        $cvss_6->vectorString = null;
        $cvss_6->baseSeverity = 'LOW';

        $cvss_7 = new CVSS31();

        $cvss_7->version = '3.1';
        $cvss_7->baseScore = 2.1234;
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->baseSeverity = 'LOW';

        $cvss_8 = new CVSS31();

        $cvss_8->version = '3.1';
        $cvss_8->baseScore = 123;
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->baseSeverity = 'LOW';

        $cvss_9 = new CVSS31();

        $cvss_9->version = '3.1';
        $cvss_9->baseScore = -123;
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->baseSeverity = 'LOW';

        $cvss_10 = new CVSS31();

        $cvss_10->version = '3.1';
        $cvss_10->baseScore = 2;
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->baseSeverity = 'LOW';
        $cvss_10->attackVector = '';

        $cvss_11 = new CVSS31();

        $cvss_11->version = '3.1';
        $cvss_11->baseScore = 2;
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->baseSeverity = 'LOW';
        $cvss_11->attackVector = '123';

        $cvss_12 = new CVSS31();

        $cvss_12->version = '3.1';
        $cvss_12->baseScore = 2;
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->baseSeverity = 'LOW';
        $cvss_12->attackComplexity = '';

        $cvss_13 = new CVSS31();

        $cvss_13->version = '3.1';
        $cvss_13->baseScore = 2;
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->baseSeverity = 'LOW';
        $cvss_13->attackComplexity = '123';

        $cvss_14 = new CVSS31();

        $cvss_14->version = '3.1';
        $cvss_14->baseScore = 2;
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->baseSeverity = 'LOW';
        $cvss_14->privilegesRequired = '';

        $cvss_15 = new CVSS31();

        $cvss_15->version = '3.1';
        $cvss_15->baseScore = 2;
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->baseSeverity = 'LOW';
        $cvss_15->privilegesRequired = '123';

        $cvss_16 = new CVSS31();

        $cvss_16->version = '3.1';
        $cvss_16->baseScore = 2;
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->baseSeverity = 'LOW';
        $cvss_16->userInteraction = '';

        $cvss_17 = new CVSS31();

        $cvss_17->version = '3.1';
        $cvss_17->baseScore = 2;
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->baseSeverity = 'LOW';
        $cvss_17->userInteraction = '123';

        $cvss_18 = new CVSS31();

        $cvss_18->version = '3.1';
        $cvss_18->baseScore = 2;
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->baseSeverity = 'LOW';
        $cvss_18->scope = '';

        $cvss_19 = new CVSS31();

        $cvss_19->version = '3.1';
        $cvss_19->baseScore = 2;
        $cvss_19->vectorString = self::VECTOR;
        $cvss_19->baseSeverity = 'LOW';
        $cvss_19->scope = '123';

        $cvss_20 = new CVSS31();

        $cvss_20->version = '3.1';
        $cvss_20->baseScore = 2;
        $cvss_20->vectorString = self::VECTOR;
        $cvss_20->baseSeverity = 'LOW';
        $cvss_20->confidentialityImpact = '';

        $cvss_21 = new CVSS31();

        $cvss_21->version = '3.1';
        $cvss_21->baseScore = 2;
        $cvss_21->vectorString = self::VECTOR;
        $cvss_21->baseSeverity = 'LOW';
        $cvss_21->confidentialityImpact = '123';

        $cvss_22 = new CVSS31();

        $cvss_22->version = '3.1';
        $cvss_22->baseScore = 2;
        $cvss_22->vectorString = self::VECTOR;
        $cvss_22->baseSeverity = 'LOW';
        $cvss_22->integrityImpact = '';

        $cvss_23 = new CVSS31();

        $cvss_23->version = '3.1';
        $cvss_23->baseScore = 2;
        $cvss_23->vectorString = self::VECTOR;
        $cvss_23->baseSeverity = 'LOW';
        $cvss_23->integrityImpact = '123';

        $cvss_24 = new CVSS31();

        $cvss_24->version = '3.1';
        $cvss_24->baseScore = 2;
        $cvss_24->vectorString = self::VECTOR;
        $cvss_24->baseSeverity = 'LOW';
        $cvss_24->availabilityImpact = '';

        $cvss_25 = new CVSS31();

        $cvss_25->version = '3.1';
        $cvss_25->baseScore = 2;
        $cvss_25->vectorString = self::VECTOR;
        $cvss_25->baseSeverity = 'LOW';
        $cvss_25->availabilityImpact = '123';

        $cvss_26 = new CVSS31();

        $cvss_26->version = '3.1';
        $cvss_26->baseScore = 2;
        $cvss_26->vectorString = self::VECTOR;
        $cvss_26->baseSeverity = 'LOW';
        $cvss_26->exploitCodeMaturity = '';

        $cvss_27 = new CVSS31();

        $cvss_27->version = '3.1';
        $cvss_27->baseScore = 2;
        $cvss_27->vectorString = self::VECTOR;
        $cvss_27->baseSeverity = 'LOW';
        $cvss_27->exploitCodeMaturity = '123';

        $cvss_28 = new CVSS31();

        $cvss_28->version = '3.1';
        $cvss_28->baseScore = 2;
        $cvss_28->vectorString = self::VECTOR;
        $cvss_28->baseSeverity = 'LOW';
        $cvss_28->remediationLevel = '';

        $cvss_29 = new CVSS31();

        $cvss_29->version = '3.1';
        $cvss_29->baseScore = 2;
        $cvss_29->vectorString = self::VECTOR;
        $cvss_29->baseSeverity = 'LOW';
        $cvss_29->remediationLevel = '123';

        $cvss_30 = new CVSS31();

        $cvss_30->version = '3.1';
        $cvss_30->baseScore = 2;
        $cvss_30->vectorString = self::VECTOR;
        $cvss_30->baseSeverity = 'LOW';
        $cvss_30->reportConfidence = '';

        $cvss_31 = new CVSS31();

        $cvss_31->version = '3.1';
        $cvss_31->baseScore = 2;
        $cvss_31->vectorString = self::VECTOR;
        $cvss_31->baseSeverity = 'LOW';
        $cvss_31->reportConfidence = '123';

        $cvss_32 = new CVSS31();

        $cvss_32->version = '3.1';
        $cvss_32->baseScore = 2;
        $cvss_32->vectorString = self::VECTOR;
        $cvss_32->baseSeverity = 'LOW';
        $cvss_32->temporalScore = -2;

        $cvss_33 = new CVSS31();

        $cvss_33->version = '3.1';
        $cvss_33->baseScore = 2;
        $cvss_33->vectorString = self::VECTOR;
        $cvss_33->baseSeverity = 'LOW';
        $cvss_33->temporalScore = 123;

        $cvss_34 = new CVSS31();

        $cvss_34->version = '3.1';
        $cvss_34->baseScore = 2;
        $cvss_34->vectorString = self::VECTOR;
        $cvss_34->baseSeverity = 'LOW';
        $cvss_34->temporalScore = 0.123;

        $cvss_35 = new CVSS31();

        $cvss_35->version = '3.1';
        $cvss_35->baseScore = 2;
        $cvss_35->vectorString = self::VECTOR;
        $cvss_35->baseSeverity = 'LOW';
        $cvss_35->temporalScore = -2.2;

        $cvss_36 = new CVSS31();

        $cvss_36->version = '3.1';
        $cvss_36->baseScore = 2;
        $cvss_36->vectorString = self::VECTOR;
        $cvss_36->baseSeverity = 'LOW';
        $cvss_36->temporalSeverity = '';

        $cvss_37 = new CVSS31();

        $cvss_37->version = '3.1';
        $cvss_37->baseScore = 2;
        $cvss_37->vectorString = self::VECTOR;
        $cvss_37->baseSeverity = 'LOW';
        $cvss_37->temporalSeverity = '123';

        $cvss_38 = new CVSS31();

        $cvss_38->version = '3.1';
        $cvss_38->baseScore = 2;
        $cvss_38->vectorString = self::VECTOR;
        $cvss_38->baseSeverity = 'LOW';
        $cvss_38->confidentialityRequirement = '';

        $cvss_39 = new CVSS31();

        $cvss_39->version = '3.1';
        $cvss_39->baseScore = 2;
        $cvss_39->vectorString = self::VECTOR;
        $cvss_39->baseSeverity = 'LOW';
        $cvss_39->confidentialityRequirement = '123';

        $cvss_40 = new CVSS31();

        $cvss_40->version = '3.1';
        $cvss_40->baseScore = 2;
        $cvss_40->vectorString = self::VECTOR;
        $cvss_40->baseSeverity = 'LOW';
        $cvss_40->integrityRequirement = '';

        $cvss_41 = new CVSS31();

        $cvss_41->version = '3.1';
        $cvss_41->baseScore = 2;
        $cvss_41->vectorString = self::VECTOR;
        $cvss_41->baseSeverity = 'LOW';
        $cvss_41->integrityRequirement = '123';

        $cvss_42 = new CVSS31();

        $cvss_42->version = '3.1';
        $cvss_42->baseScore = 2;
        $cvss_42->vectorString = self::VECTOR;
        $cvss_42->baseSeverity = 'LOW';
        $cvss_42->availabilityRequirement = '';

        $cvss_43 = new CVSS31();

        $cvss_43->version = '3.1';
        $cvss_43->baseScore = 2;
        $cvss_43->vectorString = self::VECTOR;
        $cvss_43->baseSeverity = 'LOW';
        $cvss_43->availabilityRequirement = '123';

        $cvss_44 = new CVSS31();

        $cvss_44->version = '3.1';
        $cvss_44->baseScore = 2;
        $cvss_44->vectorString = self::VECTOR;
        $cvss_44->baseSeverity = 'LOW';
        $cvss_44->modifiedAttackVector = '';

        $cvss_45 = new CVSS31();

        $cvss_45->version = '3.1';
        $cvss_45->baseScore = 2;
        $cvss_45->vectorString = self::VECTOR;
        $cvss_45->baseSeverity = 'LOW';
        $cvss_45->modifiedAttackVector = '123';

        $cvss_46 = new CVSS31();

        $cvss_46->version = '3.1';
        $cvss_46->baseScore = 2;
        $cvss_46->vectorString = self::VECTOR;
        $cvss_46->baseSeverity = 'LOW';
        $cvss_46->modifiedAttackComplexity = '';

        $cvss_47 = new CVSS31();

        $cvss_47->version = '3.1';
        $cvss_47->baseScore = 2;
        $cvss_47->vectorString = self::VECTOR;
        $cvss_47->baseSeverity = 'LOW';
        $cvss_47->modifiedAttackComplexity = '123';

        $cvss_48 = new CVSS31();

        $cvss_48->version = '3.1';
        $cvss_48->baseScore = 2;
        $cvss_48->vectorString = self::VECTOR;
        $cvss_48->baseSeverity = 'LOW';
        $cvss_48->modifiedPrivilegesRequired = '';

        $cvss_49 = new CVSS31();

        $cvss_49->version = '3.1';
        $cvss_49->baseScore = 2;
        $cvss_49->vectorString = self::VECTOR;
        $cvss_49->baseSeverity = 'LOW';
        $cvss_49->modifiedPrivilegesRequired = '123';

        $cvss_50 = new CVSS31();

        $cvss_50->version = '3.1';
        $cvss_50->baseScore = 2;
        $cvss_50->vectorString = self::VECTOR;
        $cvss_50->baseSeverity = 'LOW';
        $cvss_50->modifiedUserInteraction = '';

        $cvss_51 = new CVSS31();

        $cvss_51->version = '3.1';
        $cvss_51->baseScore = 2;
        $cvss_51->vectorString = self::VECTOR;
        $cvss_51->baseSeverity = 'LOW';
        $cvss_51->modifiedUserInteraction = '123';

        $cvss_52 = new CVSS31();

        $cvss_52->version = '3.1';
        $cvss_52->baseScore = 2;
        $cvss_52->vectorString = self::VECTOR;
        $cvss_52->baseSeverity = 'LOW';
        $cvss_52->modifiedScope = '';

        $cvss_53 = new CVSS31();

        $cvss_53->version = '3.1';
        $cvss_53->baseScore = 2;
        $cvss_53->vectorString = self::VECTOR;
        $cvss_53->baseSeverity = 'LOW';
        $cvss_53->modifiedScope = '123';

        $cvss_54 = new CVSS31();

        $cvss_54->version = '3.1';
        $cvss_54->baseScore = 2;
        $cvss_54->vectorString = self::VECTOR;
        $cvss_54->baseSeverity = 'LOW';
        $cvss_54->modifiedConfidentialityImpact = '';

        $cvss_55 = new CVSS31();

        $cvss_55->version = '3.1';
        $cvss_55->baseScore = 2;
        $cvss_55->vectorString = self::VECTOR;
        $cvss_55->baseSeverity = 'LOW';
        $cvss_55->modifiedConfidentialityImpact = '123';

        $cvss_56 = new CVSS31();

        $cvss_56->version = '3.1';
        $cvss_56->baseScore = 2;
        $cvss_56->vectorString = self::VECTOR;
        $cvss_56->baseSeverity = 'LOW';
        $cvss_56->modifiedIntegrityImpact = '';

        $cvss_57 = new CVSS31();

        $cvss_57->version = '3.1';
        $cvss_57->baseScore = 2;
        $cvss_57->vectorString = self::VECTOR;
        $cvss_57->baseSeverity = 'LOW';
        $cvss_57->modifiedIntegrityImpact = '123';

        $cvss_58 = new CVSS31();

        $cvss_58->version = '3.1';
        $cvss_58->baseScore = 2;
        $cvss_58->vectorString = self::VECTOR;
        $cvss_58->baseSeverity = 'LOW';
        $cvss_58->modifiedAvailabilityImpact = '';

        $cvss_59 = new CVSS31();

        $cvss_59->version = '3.1';
        $cvss_59->baseScore = 2;
        $cvss_59->vectorString = self::VECTOR;
        $cvss_59->baseSeverity = 'LOW';
        $cvss_59->modifiedAvailabilityImpact = '123';

        $cvss_60 = new CVSS31();

        $cvss_60->version = '3.1';
        $cvss_60->baseScore = 2;
        $cvss_60->vectorString = self::VECTOR;
        $cvss_60->baseSeverity = 'LOW';
        $cvss_60->environmentScore = -2;

        $cvss_61 = new CVSS31();

        $cvss_61->version = '3.1';
        $cvss_61->baseScore = 2;
        $cvss_61->vectorString = self::VECTOR;
        $cvss_61->baseSeverity = 'LOW';
        $cvss_61->environmentScore = 12;

        $cvss_62 = new CVSS31();

        $cvss_62->version = '3.1';
        $cvss_62->baseScore = 2;
        $cvss_62->vectorString = self::VECTOR;
        $cvss_62->baseSeverity = 'LOW';
        $cvss_62->environmentScore = 2.22;

        $cvss_63 = new CVSS31();

        $cvss_63->version = '3.1';
        $cvss_63->baseScore = 2;
        $cvss_63->vectorString = self::VECTOR;
        $cvss_63->baseSeverity = 'LOW';
        $cvss_63->environmentScore = -1.12;

        $cvss_64 = new CVSS31();

        $cvss_64->version = '3.1';
        $cvss_64->baseScore = 2;
        $cvss_64->vectorString = self::VECTOR;
        $cvss_64->baseSeverity = 'LOW';
        $cvss_64->environmentSeverity = '';

        $cvss_65 = new CVSS31();

        $cvss_65->version = '3.1';
        $cvss_65->baseScore = 2;
        $cvss_65->vectorString = self::VECTOR;
        $cvss_65->baseSeverity = 'LOW';
        $cvss_65->environmentSeverity = '123';


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
            $cvss_22,
            $cvss_23,
            $cvss_24,
            $cvss_25,
            $cvss_26,
            $cvss_27,
            $cvss_28,
            $cvss_29,
            $cvss_30,
            $cvss_31,
            $cvss_32,
            $cvss_33,
            $cvss_34,
            $cvss_35,
            $cvss_36,
            $cvss_37,
            $cvss_38,
            $cvss_39,
            $cvss_40,
            $cvss_41,
            $cvss_42,
            $cvss_43,
            $cvss_44,
            $cvss_45,
            $cvss_46,
            $cvss_47,
            $cvss_48,
            $cvss_49,
            $cvss_50,
            $cvss_51,
            $cvss_52,
            $cvss_53,
            $cvss_54,
            $cvss_55,
            $cvss_56,
            $cvss_57,
            $cvss_58,
            $cvss_59,
            $cvss_60,
            $cvss_61,
            $cvss_62,
            $cvss_63,
            $cvss_64,
            $cvss_65,
        ];
    }
}