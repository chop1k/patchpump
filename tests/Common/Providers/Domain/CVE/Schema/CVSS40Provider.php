<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\CVSS40;

final class CVSS40Provider
{
    public const VECTOR = 'CVSS:4.0/AV:N/AC:L/AT:N/PR:N/UI:N/VC:N/VI:N/VA:H/SC:N/SI:N/SA:N/AU:Y/R:A/V:C/RE:M/U:Green';

    /**
     * @return CVSS40[]
     */
    public static function provideValid(): array
    {
        $cvss_0 = new CVSS40();

        $cvss_0->version = '4.0';
        $cvss_0->vectorString = self::VECTOR;
        $cvss_0->baseScore = 3;
        $cvss_0->baseSeverity = 'LOW';

        $cvss_1 = new CVSS40();

        $cvss_1->version = '4.0';
        $cvss_1->vectorString = self::VECTOR;
        $cvss_1->baseScore = 0;
        $cvss_1->baseSeverity = 'LOW';

        $cvss_2 = new CVSS40();

        $cvss_2->version = '4.0';
        $cvss_2->vectorString = self::VECTOR;
        $cvss_2->baseScore = 3;
        $cvss_2->baseSeverity = 'LOW';
        $cvss_2->attackVector = 'LOCAL';

        $cvss_3 = new CVSS40();

        $cvss_3->version = '4.0';
        $cvss_3->vectorString = self::VECTOR;
        $cvss_3->baseScore = 3;
        $cvss_3->baseSeverity = 'LOW';
        $cvss_3->attackComplexity = 'LOW';

        $cvss_4 = new CVSS40();

        $cvss_4->version = '4.0';
        $cvss_4->vectorString = self::VECTOR;
        $cvss_4->baseScore = 3;
        $cvss_4->baseSeverity = 'LOW';
        $cvss_4->attackRequirements = 'PRESENT';

        $cvss_5 = new CVSS40();

        $cvss_5->version = '4.0';
        $cvss_5->vectorString = self::VECTOR;
        $cvss_5->baseScore = 3;
        $cvss_5->baseSeverity = 'LOW';
        $cvss_5->privilegesRequired = 'NONE';

        $cvss_6 = new CVSS40();

        $cvss_6->version = '4.0';
        $cvss_6->vectorString = self::VECTOR;
        $cvss_6->baseScore = 3;
        $cvss_6->baseSeverity = 'LOW';
        $cvss_6->userInteraction = 'PASSIVE';

        $cvss_7 = new CVSS40();

        $cvss_7->version = '4.0';
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->baseScore = 3;
        $cvss_7->baseSeverity = 'LOW';
        $cvss_7->vulnConfidentialityImpact = 'LOW';

        $cvss_8 = new CVSS40();

        $cvss_8->version = '4.0';
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->baseScore = 3;
        $cvss_8->baseSeverity = 'LOW';
        $cvss_8->vulnIntegrityImpact = 'LOW';

        $cvss_9 = new CVSS40();

        $cvss_9->version = '4.0';
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->baseScore = 3;
        $cvss_9->baseSeverity = 'LOW';
        $cvss_9->vulnAvailabilityImpact = 'LOW';

        $cvss_10 = new CVSS40();

        $cvss_10->version = '4.0';
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->baseScore = 3;
        $cvss_10->baseSeverity = 'LOW';
        $cvss_10->subConfidentialityImpact = 'HIGH';

        $cvss_11 = new CVSS40();

        $cvss_11->version = '4.0';
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->baseScore = 3;
        $cvss_11->baseSeverity = 'LOW';
        $cvss_11->subIntegrityImpact = 'NONE';

        $cvss_12 = new CVSS40();

        $cvss_12->version = '4.0';
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->baseScore = 3;
        $cvss_12->baseSeverity = 'LOW';
        $cvss_12->subAvailabilityImpact = 'LOW';

        $cvss_13 = new CVSS40();

        $cvss_13->version = '4.0';
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->baseScore = 3;
        $cvss_13->baseSeverity = 'LOW';
        $cvss_13->exploitMaturity = 'PROOF_OF_CONCEPT';

        $cvss_14 = new CVSS40();

        $cvss_14->version = '4.0';
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->baseScore = 3;
        $cvss_14->baseSeverity = 'LOW';
        $cvss_14->confidentialityRequirement = 'NOT_DEFINED';

        $cvss_15 = new CVSS40();

        $cvss_15->version = '4.0';
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->baseScore = 3;
        $cvss_15->baseSeverity = 'LOW';
        $cvss_15->integrityRequirement = 'LOW';

        $cvss_16 = new CVSS40();

        $cvss_16->version = '4.0';
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->baseScore = 3;
        $cvss_16->baseSeverity = 'LOW';
        $cvss_16->availabilityRequirement = 'NONE';

        $cvss_17 = new CVSS40();

        $cvss_17->version = '4.0';
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->baseScore = 3;
        $cvss_17->baseSeverity = 'LOW';
        $cvss_17->modifiedAttackVector = 'PHYSICAL';

        $cvss_18 = new CVSS40();

        $cvss_18->version = '4.0';
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->baseScore = 3;
        $cvss_18->baseSeverity = 'LOW';
        $cvss_18->modifiedAttackComplexity = 'LOW';

        $cvss_19 = new CVSS40();

        $cvss_19->version = '4.0';
        $cvss_19->vectorString = self::VECTOR;
        $cvss_19->baseScore = 3;
        $cvss_19->baseSeverity = 'LOW';
        $cvss_19->modifiedAttackRequirements = 'PRESENT';

        $cvss_20 = new CVSS40();

        $cvss_20->version = '4.0';
        $cvss_20->vectorString = self::VECTOR;
        $cvss_20->baseScore = 3;
        $cvss_20->baseSeverity = 'LOW';
        $cvss_20->modifiedPrivilegesRequired = 'HIGH';

        $cvss_21 = new CVSS40();

        $cvss_21->version = '4.0';
        $cvss_21->vectorString = self::VECTOR;
        $cvss_21->baseScore = 3;
        $cvss_21->baseSeverity = 'LOW';
        $cvss_21->modifiedUserInteraction = 'ACTIVE';

        $cvss_22 = new CVSS40();

        $cvss_22->version = '4.0';
        $cvss_22->vectorString = self::VECTOR;
        $cvss_22->baseScore = 3;
        $cvss_22->baseSeverity = 'LOW';
        $cvss_22->modifiedVulnConfidentialityImpact = 'LOW';

        $cvss_23 = new CVSS40();

        $cvss_23->version = '4.0';
        $cvss_23->vectorString = self::VECTOR;
        $cvss_23->baseScore = 3;
        $cvss_23->baseSeverity = 'LOW';
        $cvss_23->modifiedVulnIntegrityImpact = 'HIGH';

        $cvss_24 = new CVSS40();

        $cvss_24->version = '4.0';
        $cvss_24->vectorString = self::VECTOR;
        $cvss_24->baseScore = 3;
        $cvss_24->baseSeverity = 'LOW';
        $cvss_24->modifiedVulnAvailabilityImpact = 'NOT_DEFINED';

        $cvss_25 = new CVSS40();

        $cvss_25->version = '4.0';
        $cvss_25->vectorString = self::VECTOR;
        $cvss_25->baseScore = 3;
        $cvss_25->baseSeverity = 'LOW';
        $cvss_25->modifiedSubConfidentialityImpact = 'NOT_DEFINED';

        $cvss_26 = new CVSS40();

        $cvss_26->version = '4.0';
        $cvss_26->vectorString = self::VECTOR;
        $cvss_26->baseScore = 3;
        $cvss_26->baseSeverity = 'LOW';
        $cvss_26->modifiedSubIntegrityImpact = 'NOT_DEFINED';

        $cvss_27 = new CVSS40();

        $cvss_27->version = '4.0';
        $cvss_27->vectorString = self::VECTOR;
        $cvss_27->baseScore = 3;
        $cvss_27->baseSeverity = 'LOW';
        $cvss_27->modifiedSubAvailabilityImpact = 'NOT_DEFINED';

        $cvss_28 = new CVSS40();

        $cvss_28->version = '4.0';
        $cvss_28->vectorString = self::VECTOR;
        $cvss_28->baseScore = 3;
        $cvss_28->baseSeverity = 'LOW';
        $cvss_28->SafetyType = 'PRESENT';

        $cvss_29 = new CVSS40();

        $cvss_29->version = '4.0';
        $cvss_29->vectorString = self::VECTOR;
        $cvss_29->baseScore = 3;
        $cvss_29->baseSeverity = 'LOW';
        $cvss_29->Automatable = 'YES';

        $cvss_30 = new CVSS40();

        $cvss_30->version = '4.0';
        $cvss_30->vectorString = self::VECTOR;
        $cvss_30->baseScore = 3;
        $cvss_30->baseSeverity = 'LOW';
        $cvss_30->Recovery = 'USER';

        $cvss_31 = new CVSS40();

        $cvss_31->version = '4.0';
        $cvss_31->vectorString = self::VECTOR;
        $cvss_31->baseScore = 3;
        $cvss_31->baseSeverity = 'LOW';
        $cvss_31->valueDensity = 'CONCENTRATED';

        $cvss_32 = new CVSS40();

        $cvss_32->version = '4.0';
        $cvss_32->vectorString = self::VECTOR;
        $cvss_32->baseScore = 3;
        $cvss_32->baseSeverity = 'LOW';
        $cvss_32->vulnerabilityResponseEffort = 'MODERATE';

        $cvss_33 = new CVSS40();

        $cvss_33->version = '4.0';
        $cvss_33->vectorString = self::VECTOR;
        $cvss_33->baseScore = 3;
        $cvss_33->baseSeverity = 'LOW';
        $cvss_33->providerUrgency = 'RED';

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
        ];
    }

    /**
     * @return CVSS40[]
     */
    public static function provideInvalid(): array
    {
        $cvss_0 = new CVSS40();

        $cvss_0->version = '1.0';
        $cvss_0->vectorString = self::VECTOR;
        $cvss_0->baseScore = 3;
        $cvss_0->baseSeverity = 'LOW';

        $cvss_1 = new CVSS40();

        $cvss_1->version = null;
        $cvss_1->vectorString = self::VECTOR;
        $cvss_1->baseScore = 3;
        $cvss_1->baseSeverity = 'LOW';

        $cvss_2 = new CVSS40();

        $cvss_2->version = '4.0';
        $cvss_2->vectorString = null;
        $cvss_2->baseScore = 3;
        $cvss_2->baseSeverity = 'LOW';

        $cvss_3 = new CVSS40();

        $cvss_3->version = '4.0';
        $cvss_3->vectorString = self::VECTOR;
        $cvss_3->baseScore = null;
        $cvss_3->baseSeverity = 'LOW';

        $cvss_4 = new CVSS40();

        $cvss_4->version = '4.0';
        $cvss_4->vectorString = self::VECTOR;
        $cvss_4->baseScore = 3;
        $cvss_4->baseSeverity = null;

        $cvss_5 = new CVSS40();

        $cvss_5->version = '';
        $cvss_5->vectorString = self::VECTOR;
        $cvss_5->baseScore = 3;
        $cvss_5->baseSeverity = 'LOW';

        $cvss_6 = new CVSS40();

        $cvss_6->version = '4.0';
        $cvss_6->vectorString = '123';
        $cvss_6->baseScore = 3;
        $cvss_6->baseSeverity = 'LOW';

        $cvss_7 = new CVSS40();

        $cvss_7->version = '4.0';
        $cvss_7->vectorString = self::VECTOR;
        $cvss_7->baseScore = 12;
        $cvss_7->baseSeverity = 'LOW';

        $cvss_8 = new CVSS40();

        $cvss_8->version = '4.0';
        $cvss_8->vectorString = self::VECTOR;
        $cvss_8->baseScore = -1;
        $cvss_8->baseSeverity = 'LOW';

        $cvss_9 = new CVSS40();

        $cvss_9->version = '4.0';
        $cvss_9->vectorString = self::VECTOR;
        $cvss_9->baseScore = -1.12;
        $cvss_9->baseSeverity = 'LOW';

        $cvss_10 = new CVSS40();

        $cvss_10->version = '4.0';
        $cvss_10->vectorString = self::VECTOR;
        $cvss_10->baseScore = 1.12;
        $cvss_10->baseSeverity = 'LOW';

        $cvss_11 = new CVSS40();

        $cvss_11->version = '4.0';
        $cvss_11->vectorString = self::VECTOR;
        $cvss_11->baseScore = 1;
        $cvss_11->baseSeverity = '';

        $cvss_12 = new CVSS40();

        $cvss_12->version = '4.0';
        $cvss_12->vectorString = self::VECTOR;
        $cvss_12->baseScore = 1;
        $cvss_12->baseSeverity = '123';

        $cvss_13 = new CVSS40();

        $cvss_13->version = '4.0';
        $cvss_13->vectorString = self::VECTOR;
        $cvss_13->baseScore = 3;
        $cvss_13->baseSeverity = 'LOW';
        $cvss_13->attackVector = '';

        $cvss_14 = new CVSS40();

        $cvss_14->version = '4.0';
        $cvss_14->vectorString = self::VECTOR;
        $cvss_14->baseScore = 3;
        $cvss_14->baseSeverity = 'LOW';
        $cvss_14->attackVector = '123';

        $cvss_15 = new CVSS40();

        $cvss_15->version = '4.0';
        $cvss_15->vectorString = self::VECTOR;
        $cvss_15->baseScore = 3;
        $cvss_15->baseSeverity = 'LOW';
        $cvss_15->attackComplexity = '';

        $cvss_16 = new CVSS40();

        $cvss_16->version = '4.0';
        $cvss_16->vectorString = self::VECTOR;
        $cvss_16->baseScore = 3;
        $cvss_16->baseSeverity = 'LOW';
        $cvss_16->attackComplexity = '123';

        $cvss_17 = new CVSS40();

        $cvss_17->version = '4.0';
        $cvss_17->vectorString = self::VECTOR;
        $cvss_17->baseScore = 3;
        $cvss_17->baseSeverity = 'LOW';
        $cvss_17->attackRequirements = '';

        $cvss_18 = new CVSS40();

        $cvss_18->version = '4.0';
        $cvss_18->vectorString = self::VECTOR;
        $cvss_18->baseScore = 3;
        $cvss_18->baseSeverity = 'LOW';
        $cvss_18->attackRequirements = '123';

        $cvss_19 = new CVSS40();

        $cvss_19->version = '4.0';
        $cvss_19->vectorString = self::VECTOR;
        $cvss_19->baseScore = 3;
        $cvss_19->baseSeverity = 'LOW';
        $cvss_19->privilegesRequired = '';

        $cvss_20 = new CVSS40();

        $cvss_20->version = '4.0';
        $cvss_20->vectorString = self::VECTOR;
        $cvss_20->baseScore = 3;
        $cvss_20->baseSeverity = 'LOW';
        $cvss_20->privilegesRequired = '123';

        $cvss_21 = new CVSS40();

        $cvss_21->version = '4.0';
        $cvss_21->vectorString = self::VECTOR;
        $cvss_21->baseScore = 3;
        $cvss_21->baseSeverity = 'LOW';
        $cvss_21->userInteraction = '';

        $cvss_22 = new CVSS40();

        $cvss_22->version = '4.0';
        $cvss_22->vectorString = self::VECTOR;
        $cvss_22->baseScore = 3;
        $cvss_22->baseSeverity = 'LOW';
        $cvss_22->userInteraction = '123';

        $cvss_23 = new CVSS40();

        $cvss_23->version = '4.0';
        $cvss_23->vectorString = self::VECTOR;
        $cvss_23->baseScore = 3;
        $cvss_23->baseSeverity = 'LOW';
        $cvss_23->vulnConfidentialityImpact = '';

        $cvss_24 = new CVSS40();

        $cvss_24->version = '4.0';
        $cvss_24->vectorString = self::VECTOR;
        $cvss_24->baseScore = 3;
        $cvss_24->baseSeverity = 'LOW';
        $cvss_24->vulnConfidentialityImpact = '123';

        $cvss_25 = new CVSS40();

        $cvss_25->version = '4.0';
        $cvss_25->vectorString = self::VECTOR;
        $cvss_25->baseScore = 3;
        $cvss_25->baseSeverity = 'LOW';
        $cvss_25->vulnIntegrityImpact = '';

        $cvss_26 = new CVSS40();

        $cvss_26->version = '4.0';
        $cvss_26->vectorString = self::VECTOR;
        $cvss_26->baseScore = 3;
        $cvss_26->baseSeverity = 'LOW';
        $cvss_26->vulnIntegrityImpact = '123';

        $cvss_27 = new CVSS40();

        $cvss_27->version = '4.0';
        $cvss_27->vectorString = self::VECTOR;
        $cvss_27->baseScore = 3;
        $cvss_27->baseSeverity = 'LOW';
        $cvss_27->vulnAvailabilityImpact = '';

        $cvss_28 = new CVSS40();

        $cvss_28->version = '4.0';
        $cvss_28->vectorString = self::VECTOR;
        $cvss_28->baseScore = 3;
        $cvss_28->baseSeverity = 'LOW';
        $cvss_28->vulnAvailabilityImpact = '123';

        $cvss_29 = new CVSS40();

        $cvss_29->version = '4.0';
        $cvss_29->vectorString = self::VECTOR;
        $cvss_29->baseScore = 3;
        $cvss_29->baseSeverity = 'LOW';
        $cvss_29->subConfidentialityImpact = '';

        $cvss_30 = new CVSS40();

        $cvss_30->version = '4.0';
        $cvss_30->vectorString = self::VECTOR;
        $cvss_30->baseScore = 3;
        $cvss_30->baseSeverity = 'LOW';
        $cvss_30->subConfidentialityImpact = '';

        $cvss_31 = new CVSS40();

        $cvss_31->version = '4.0';
        $cvss_31->vectorString = self::VECTOR;
        $cvss_31->baseScore = 3;
        $cvss_31->baseSeverity = 'LOW';
        $cvss_31->subConfidentialityImpact = '123';

        $cvss_32 = new CVSS40();

        $cvss_32->version = '4.0';
        $cvss_32->vectorString = self::VECTOR;
        $cvss_32->baseScore = 3;
        $cvss_32->baseSeverity = 'LOW';
        $cvss_32->subIntegrityImpact = '';

        $cvss_33 = new CVSS40();

        $cvss_33->version = '4.0';
        $cvss_33->vectorString = self::VECTOR;
        $cvss_33->baseScore = 3;
        $cvss_33->baseSeverity = 'LOW';
        $cvss_33->subIntegrityImpact = '123';

        $cvss_34 = new CVSS40();

        $cvss_34->version = '4.0';
        $cvss_34->vectorString = self::VECTOR;
        $cvss_34->baseScore = 3;
        $cvss_34->baseSeverity = 'LOW';
        $cvss_34->subAvailabilityImpact = '';

        $cvss_35 = new CVSS40();

        $cvss_35->version = '4.0';
        $cvss_35->vectorString = self::VECTOR;
        $cvss_35->baseScore = 3;
        $cvss_35->baseSeverity = 'LOW';
        $cvss_35->subAvailabilityImpact = '123';

        $cvss_36 = new CVSS40();

        $cvss_36->version = '4.0';
        $cvss_36->vectorString = self::VECTOR;
        $cvss_36->baseScore = 3;
        $cvss_36->baseSeverity = 'LOW';
        $cvss_36->exploitMaturity = '';

        $cvss_37 = new CVSS40();

        $cvss_37->version = '4.0';
        $cvss_37->vectorString = self::VECTOR;
        $cvss_37->baseScore = 3;
        $cvss_37->baseSeverity = 'LOW';
        $cvss_37->exploitMaturity = '123';

        $cvss_38 = new CVSS40();

        $cvss_38->version = '4.0';
        $cvss_38->vectorString = self::VECTOR;
        $cvss_38->baseScore = 3;
        $cvss_38->baseSeverity = 'LOW';
        $cvss_38->confidentialityRequirement = '';

        $cvss_39 = new CVSS40();

        $cvss_39->version = '4.0';
        $cvss_39->vectorString = self::VECTOR;
        $cvss_39->baseScore = 3;
        $cvss_39->baseSeverity = 'LOW';
        $cvss_39->confidentialityRequirement = '123';

        $cvss_40 = new CVSS40();

        $cvss_40->version = '4.0';
        $cvss_40->vectorString = self::VECTOR;
        $cvss_40->baseScore = 3;
        $cvss_40->baseSeverity = 'LOW';
        $cvss_40->integrityRequirement = '';

        $cvss_41 = new CVSS40();

        $cvss_41->version = '4.0';
        $cvss_41->vectorString = self::VECTOR;
        $cvss_41->baseScore = 3;
        $cvss_41->baseSeverity = 'LOW';
        $cvss_41->integrityRequirement = '123';

        $cvss_42 = new CVSS40();

        $cvss_42->version = '4.0';
        $cvss_42->vectorString = self::VECTOR;
        $cvss_42->baseScore = 3;
        $cvss_42->baseSeverity = 'LOW';
        $cvss_42->availabilityRequirement = '';

        $cvss_43 = new CVSS40();

        $cvss_43->version = '4.0';
        $cvss_43->vectorString = self::VECTOR;
        $cvss_43->baseScore = 3;
        $cvss_43->baseSeverity = 'LOW';
        $cvss_43->availabilityRequirement = '123';

        $cvss_44 = new CVSS40();

        $cvss_44->version = '4.0';
        $cvss_44->vectorString = self::VECTOR;
        $cvss_44->baseScore = 3;
        $cvss_44->baseSeverity = 'LOW';
        $cvss_44->modifiedAttackVector = '';

        $cvss_45 = new CVSS40();

        $cvss_45->version = '4.0';
        $cvss_45->vectorString = self::VECTOR;
        $cvss_45->baseScore = 3;
        $cvss_45->baseSeverity = 'LOW';
        $cvss_45->modifiedAttackVector = '123';

        $cvss_46 = new CVSS40();

        $cvss_46->version = '4.0';
        $cvss_46->vectorString = self::VECTOR;
        $cvss_46->baseScore = 3;
        $cvss_46->baseSeverity = 'LOW';
        $cvss_46->modifiedAttackComplexity = '';

        $cvss_47 = new CVSS40();

        $cvss_47->version = '4.0';
        $cvss_47->vectorString = self::VECTOR;
        $cvss_47->baseScore = 3;
        $cvss_47->baseSeverity = 'LOW';
        $cvss_47->modifiedAttackComplexity = '123';

        $cvss_48 = new CVSS40();

        $cvss_48->version = '4.0';
        $cvss_48->vectorString = self::VECTOR;
        $cvss_48->baseScore = 3;
        $cvss_48->baseSeverity = 'LOW';
        $cvss_48->modifiedAttackRequirements = '';

        $cvss_49 = new CVSS40();

        $cvss_49->version = '4.0';
        $cvss_49->vectorString = self::VECTOR;
        $cvss_49->baseScore = 3;
        $cvss_49->baseSeverity = 'LOW';
        $cvss_49->modifiedAttackRequirements = '123';

        $cvss_50 = new CVSS40();

        $cvss_50->version = '4.0';
        $cvss_50->vectorString = self::VECTOR;
        $cvss_50->baseScore = 3;
        $cvss_50->baseSeverity = 'LOW';
        $cvss_50->modifiedPrivilegesRequired = '';

        $cvss_51 = new CVSS40();

        $cvss_51->version = '4.0';
        $cvss_51->vectorString = self::VECTOR;
        $cvss_51->baseScore = 3;
        $cvss_51->baseSeverity = 'LOW';
        $cvss_51->modifiedPrivilegesRequired = '123';

        $cvss_52 = new CVSS40();

        $cvss_52->version = '4.0';
        $cvss_52->vectorString = self::VECTOR;
        $cvss_52->baseScore = 3;
        $cvss_52->baseSeverity = 'LOW';
        $cvss_52->modifiedUserInteraction = '';

        $cvss_53 = new CVSS40();

        $cvss_53->version = '4.0';
        $cvss_53->vectorString = self::VECTOR;
        $cvss_53->baseScore = 3;
        $cvss_53->baseSeverity = 'LOW';
        $cvss_53->modifiedUserInteraction = '123';

        $cvss_54 = new CVSS40();

        $cvss_54->version = '4.0';
        $cvss_54->vectorString = self::VECTOR;
        $cvss_54->baseScore = 3;
        $cvss_54->baseSeverity = 'LOW';
        $cvss_54->modifiedVulnConfidentialityImpact = '';

        $cvss_55 = new CVSS40();

        $cvss_55->version = '4.0';
        $cvss_55->vectorString = self::VECTOR;
        $cvss_55->baseScore = 3;
        $cvss_55->baseSeverity = 'LOW';
        $cvss_55->modifiedVulnConfidentialityImpact = '123';

        $cvss_56 = new CVSS40();

        $cvss_56->version = '4.0';
        $cvss_56->vectorString = self::VECTOR;
        $cvss_56->baseScore = 3;
        $cvss_56->baseSeverity = 'LOW';
        $cvss_56->modifiedVulnIntegrityImpact = '';

        $cvss_57 = new CVSS40();

        $cvss_57->version = '4.0';
        $cvss_57->vectorString = self::VECTOR;
        $cvss_57->baseScore = 3;
        $cvss_57->baseSeverity = 'LOW';
        $cvss_57->modifiedVulnIntegrityImpact = '123';

        $cvss_58 = new CVSS40();

        $cvss_58->version = '4.0';
        $cvss_58->vectorString = self::VECTOR;
        $cvss_58->baseScore = 3;
        $cvss_58->baseSeverity = 'LOW';
        $cvss_58->modifiedVulnAvailabilityImpact = '';

        $cvss_59 = new CVSS40();

        $cvss_59->version = '4.0';
        $cvss_59->vectorString = self::VECTOR;
        $cvss_59->baseScore = 3;
        $cvss_59->baseSeverity = 'LOW';
        $cvss_59->modifiedVulnAvailabilityImpact = '123';

        $cvss_60 = new CVSS40();

        $cvss_60->version = '4.0';
        $cvss_60->vectorString = self::VECTOR;
        $cvss_60->baseScore = 3;
        $cvss_60->baseSeverity = 'LOW';
        $cvss_60->modifiedSubConfidentialityImpact = '';

        $cvss_61 = new CVSS40();

        $cvss_61->version = '4.0';
        $cvss_61->vectorString = self::VECTOR;
        $cvss_61->baseScore = 3;
        $cvss_61->baseSeverity = 'LOW';
        $cvss_61->modifiedSubConfidentialityImpact = '123';

        $cvss_62 = new CVSS40();

        $cvss_62->version = '4.0';
        $cvss_62->vectorString = self::VECTOR;
        $cvss_62->baseScore = 3;
        $cvss_62->baseSeverity = 'LOW';
        $cvss_62->modifiedSubIntegrityImpact = '';

        $cvss_63 = new CVSS40();

        $cvss_63->version = '4.0';
        $cvss_63->vectorString = self::VECTOR;
        $cvss_63->baseScore = 3;
        $cvss_63->baseSeverity = 'LOW';
        $cvss_63->modifiedSubIntegrityImpact = '123';

        $cvss_64 = new CVSS40();

        $cvss_64->version = '4.0';
        $cvss_64->vectorString = self::VECTOR;
        $cvss_64->baseScore = 3;
        $cvss_64->baseSeverity = 'LOW';
        $cvss_64->modifiedSubAvailabilityImpact = '';

        $cvss_65 = new CVSS40();

        $cvss_65->version = '4.0';
        $cvss_65->vectorString = self::VECTOR;
        $cvss_65->baseScore = 3;
        $cvss_65->baseSeverity = 'LOW';
        $cvss_65->modifiedSubAvailabilityImpact = '123';

        $cvss_66 = new CVSS40();

        $cvss_66->version = '4.0';
        $cvss_66->vectorString = self::VECTOR;
        $cvss_66->baseScore = 3;
        $cvss_66->baseSeverity = 'LOW';
        $cvss_66->SafetyType = '';

        $cvss_67 = new CVSS40();

        $cvss_67->version = '4.0';
        $cvss_67->vectorString = self::VECTOR;
        $cvss_67->baseScore = 3;
        $cvss_67->baseSeverity = 'LOW';
        $cvss_67->SafetyType = '123';

        $cvss_68 = new CVSS40();

        $cvss_68->version = '4.0';
        $cvss_68->vectorString = self::VECTOR;
        $cvss_68->baseScore = 3;
        $cvss_68->baseSeverity = 'LOW';
        $cvss_68->Automatable = '';

        $cvss_69 = new CVSS40();

        $cvss_69->version = '4.0';
        $cvss_69->vectorString = self::VECTOR;
        $cvss_69->baseScore = 3;
        $cvss_69->baseSeverity = 'LOW';
        $cvss_69->Automatable = '123';

        $cvss_70 = new CVSS40();

        $cvss_70->version = '4.0';
        $cvss_70->vectorString = self::VECTOR;
        $cvss_70->baseScore = 3;
        $cvss_70->baseSeverity = 'LOW';
        $cvss_70->Recovery = '';

        $cvss_71 = new CVSS40();

        $cvss_71->version = '4.0';
        $cvss_71->vectorString = self::VECTOR;
        $cvss_71->baseScore = 3;
        $cvss_71->baseSeverity = 'LOW';
        $cvss_71->Recovery = '123';

        $cvss_72 = new CVSS40();

        $cvss_72->version = '4.0';
        $cvss_72->vectorString = self::VECTOR;
        $cvss_72->baseScore = 3;
        $cvss_72->baseSeverity = 'LOW';
        $cvss_72->valueDensity = '';

        $cvss_73 = new CVSS40();

        $cvss_73->version = '4.0';
        $cvss_73->vectorString = self::VECTOR;
        $cvss_73->baseScore = 3;
        $cvss_73->baseSeverity = 'LOW';
        $cvss_73->valueDensity = '123';

        $cvss_74 = new CVSS40();

        $cvss_74->version = '4.0';
        $cvss_74->vectorString = self::VECTOR;
        $cvss_74->baseScore = 3;
        $cvss_74->baseSeverity = 'LOW';
        $cvss_74->vulnerabilityResponseEffort = '';

        $cvss_75 = new CVSS40();

        $cvss_75->version = '4.0';
        $cvss_75->vectorString = self::VECTOR;
        $cvss_75->baseScore = 3;
        $cvss_75->baseSeverity = 'LOW';
        $cvss_75->vulnerabilityResponseEffort = '123';

        $cvss_76 = new CVSS40();

        $cvss_76->version = '4.0';
        $cvss_76->vectorString = self::VECTOR;
        $cvss_76->baseScore = 3;
        $cvss_76->baseSeverity = 'LOW';
        $cvss_76->providerUrgency = '';

        $cvss_77 = new CVSS40();

        $cvss_77->version = '4.0';
        $cvss_77->vectorString = self::VECTOR;
        $cvss_77->baseScore = 3;
        $cvss_77->baseSeverity = 'LOW';
        $cvss_77->providerUrgency = '123';

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
            $cvss_66,
            $cvss_67,
            $cvss_68,
            $cvss_69,
            $cvss_70,
            $cvss_71,
            $cvss_72,
            $cvss_73,
            $cvss_74,
            $cvss_75,
            $cvss_76,
            $cvss_77,
        ];
    }
}