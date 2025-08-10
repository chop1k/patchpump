<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\CNA;

if (false === function_exists('provide_valid_cna')) {
    /**
     * @return CNA[]
     */
    function provide_valid_cna(): array
    {
        $cna_0 = new CNA();

        $cna_0->providerMetadata = provide_valid_provider_metadata()[0];

        $cna_1 = new CNA();

        $cna_1->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_1->title = '123';

        $cna_2 = new CNA();

        $cna_2->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_2->descriptions = provide_valid_descriptions();

        $cna_3 = new CNA();

        $cna_3->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_3->affected = provide_valid_affected();

        $cna_4 = new CNA();

        $cna_4->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_4->cpeApplicability = provide_valid_cpe_applicability();

        $cna_5 = new CNA();

        $cna_5->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_5->problemTypes = provide_valid_problem_types();

        $cna_6 = new CNA();

        $cna_6->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_6->references = provide_valid_references();

        $cna_7 = new CNA();

        $cna_7->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_7->impacts = provide_valid_impacts();

        $cna_8 = new CNA();

        $cna_8->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_8->metrics = provide_valid_metrics();

        $cna_9 = new CNA();

        $cna_9->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_9->configurations = provide_valid_descriptions();

        $cna_10 = new CNA();

        $cna_10->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_10->workarounds = provide_valid_descriptions();

        $cna_11 = new CNA();

        $cna_11->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_11->solutions = provide_valid_descriptions();

        $cna_12 = new CNA();

        $cna_12->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_12->exploits = provide_valid_descriptions();

        $cna_13 = new CNA();

        $cna_13->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_13->timeline = provide_valid_timelines();

        $cna_14 = new CNA();

        $cna_14->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_14->credits = provide_valid_credits();

        $cna_15 = new CNA();

        $cna_15->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_15->source = [
            'a' => 'b',
            '1' => 2,
            '3' => true,
            'j' => new stdClass(),
        ];

        $cna_16 = new CNA();

        $cna_16->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_16->tags = [
            'x_123',
        ];

        $cna_17 = new CNA();

        $cna_17->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_17->tags = [
            'disputed',
        ];

        $cna_18 = new CNA();

        $cna_18->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_18->tags = [
            'x_',
        ];

        $cna_19 = new CNA();

        $cna_19->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_19->tags = [
            'x_',
            'disputed',
        ];

        $cna_20 = new CNA();

        $cna_20->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_20->taxonomyMappings = provide_valid_taxonomy_mappings();

        $cna_21 = new CNA();

        $cna_21->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_21->datePublic = '2025-03-19T18:41:32.004Z';

        $cna_22 = new CNA();

        $cna_22->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_22->dateAssigned = '2008-10-14T00:00:00';

        $cna_23 = new CNA();

        $cna_23->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_23->rejectedReasons = provide_valid_descriptions();

        return [
            $cna_0,
            $cna_1,
            $cna_2,
            $cna_3,
            $cna_4,
            $cna_5,
            $cna_6,
            $cna_7,
            $cna_8,
            $cna_9,
            $cna_10,
            $cna_11,
            $cna_12,
            $cna_13,
            $cna_14,
            $cna_15,
            $cna_16,
            $cna_17,
            $cna_18,
            $cna_19,
            $cna_20,
            $cna_21,
            $cna_22,
            $cna_23,
        ];
    }
}

if (false === function_exists('provide_invalid_cna')) {
    /**
     * @return CNA[]
     */
    function provide_invalid_cna(): array
    {
        $cna_0 = new CNA();

        $cna_0->providerMetadata = provide_invalid_provider_metadata()[0];

        $cna_1 = new CNA();

        $cna_1->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_1->title = '';

        $cna_2 = new CNA();

        $cna_2->providerMetadata = null;

        $cna_3 = new CNA();

        $cna_3->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_3->descriptions = [];

        $cna_4 = new CNA();

        $cna_4->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_4->descriptions = [
            null,
        ];

        $cna_5 = new CNA();

        $cna_5->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_5->descriptions = [
            true,
        ];

        $cna_6 = new CNA();

        $cna_6->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_6->descriptions = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_7 = new CNA();

        $cna_7->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_7->descriptions = provide_invalid_descriptions();

        $cna_8 = new CNA();

        $cna_8->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_8->affected = [];

        $cna_9 = new CNA();

        $cna_9->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_9->affected = [
            null,
        ];

        $cna_10 = new CNA();

        $cna_10->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_10->affected = [
            true,
        ];

        $cna_11 = new CNA();

        $cna_11->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_11->affected = [
            null,
            ...provide_valid_affected(),
        ];

        $cna_12 = new CNA();

        $cna_12->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_12->affected = provide_invalid_affected();

        $cna_13 = new CNA();

        $cna_13->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_13->cpeApplicability = [
            null,
        ];

        $cna_14 = new CNA();

        $cna_14->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_14->cpeApplicability = [
            true,
        ];

        $cna_15 = new CNA();

        $cna_15->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_15->cpeApplicability = [
            null,
            ...provide_valid_cpe_applicability(),
        ];

        $cna_16 = new CNA();

        $cna_16->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_16->cpeApplicability = provide_invalid_cpe_applicability();

        $cna_17 = new CNA();

        $cna_17->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_17->problemTypes = [];

        $cna_18 = new CNA();

        $cna_18->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_18->problemTypes = [
            null,
        ];

        $cna_19 = new CNA();

        $cna_19->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_19->problemTypes = [
            true,
        ];

        $cna_20 = new CNA();

        $cna_20->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_20->problemTypes = [
            null,
            ...provide_valid_problem_types(),
        ];

        $cna_21 = new CNA();

        $cna_21->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_21->problemTypes = provide_invalid_problem_types();

        $cna_22 = new CNA();

        $cna_22->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_22->references = [];

        $cna_23 = new CNA();

        $cna_23->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_23->references = [
            null,
        ];

        $cna_24 = new CNA();

        $cna_24->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_24->references = [
            true,
        ];

        $cna_25 = new CNA();

        $cna_25->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_25->references = [
            null,
            ...provide_valid_references(),
        ];

        $cna_26 = new CNA();

        $cna_26->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_26->references = provide_invalid_references();

        $cna_27 = new CNA();

        $cna_27->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_27->impacts = [];

        $cna_28 = new CNA();

        $cna_28->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_28->impacts = [
            null,
        ];

        $cna_29 = new CNA();

        $cna_29->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_29->impacts = [
            true,
        ];

        $cna_30 = new CNA();

        $cna_30->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_30->impacts = [
            null,
            ...provide_valid_impacts(),
        ];

        $cna_31 = new CNA();

        $cna_31->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_31->impacts = provide_invalid_impacts();

        $cna_32 = new CNA();

        $cna_32->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_32->metrics = [];

        $cna_33 = new CNA();

        $cna_33->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_33->metrics = [
            null,
        ];

        $cna_34 = new CNA();

        $cna_34->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_34->metrics = [
            true,
        ];

        $cna_35 = new CNA();

        $cna_35->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_35->metrics = [
            null,
            ...provide_valid_metrics(),
        ];

        $cna_36 = new CNA();

        $cna_36->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_36->metrics = provide_invalid_metrics();

        $cna_37 = new CNA();

        $cna_37->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_37->configurations = [];

        $cna_38 = new CNA();

        $cna_38->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_38->configurations = [
            null,
        ];

        $cna_39 = new CNA();

        $cna_39->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_39->configurations = [
            true,
        ];

        $cna_40 = new CNA();

        $cna_40->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_40->configurations = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_41 = new CNA();

        $cna_41->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_41->configurations = provide_invalid_descriptions();

        $cna_42 = new CNA();

        $cna_42->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_42->workarounds = [];

        $cna_43 = new CNA();

        $cna_43->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_43->workarounds = [
            null,
        ];

        $cna_44 = new CNA();

        $cna_44->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_44->workarounds = [
            true,
        ];

        $cna_45 = new CNA();

        $cna_45->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_45->workarounds = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_46 = new CNA();

        $cna_46->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_46->workarounds = provide_invalid_descriptions();

        $cna_47 = new CNA();

        $cna_47->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_47->solutions = [];

        $cna_48 = new CNA();

        $cna_48->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_48->solutions = [
            null,
        ];

        $cna_49 = new CNA();

        $cna_49->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_49->solutions = [
            true,
        ];

        $cna_50 = new CNA();

        $cna_50->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_50->solutions = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_51 = new CNA();

        $cna_51->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_51->solutions = provide_invalid_descriptions();

        $cna_52 = new CNA();

        $cna_52->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_52->exploits = [];

        $cna_53 = new CNA();

        $cna_53->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_53->exploits = [
            null,
        ];

        $cna_54 = new CNA();

        $cna_54->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_54->exploits = [
            true,
        ];

        $cna_55 = new CNA();

        $cna_55->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_55->exploits = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_56 = new CNA();

        $cna_56->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_56->exploits = provide_invalid_descriptions();

        $cna_57 = new CNA();

        $cna_57->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_57->timeline = [];

        $cna_58 = new CNA();

        $cna_58->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_58->timeline = [
            null,
        ];

        $cna_59 = new CNA();

        $cna_59->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_59->timeline = [
            true,
        ];

        $cna_60 = new CNA();

        $cna_60->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_60->timeline = [
            null,
            ...provide_valid_timelines(),
        ];

        $cna_61 = new CNA();

        $cna_61->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_61->timeline = provide_invalid_timelines();

        $cna_62 = new CNA();

        $cna_62->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_62->credits = [];

        $cna_63 = new CNA();

        $cna_63->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_63->credits = [
            null,
        ];

        $cna_64 = new CNA();

        $cna_64->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_64->credits = [
            true,
        ];

        $cna_65 = new CNA();

        $cna_65->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_65->credits = [
            null,
            ...provide_valid_credits(),
        ];

        $cna_66 = new CNA();

        $cna_66->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_66->credits = provide_invalid_credits();

        $cna_67 = new CNA();

        $cna_67->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_67->source = [];

        $cna_68 = new CNA();

        $cna_68->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_68->tags = [];

        $cna_69 = new CNA();

        $cna_69->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_69->tags = [
            true,
        ];

        $cna_70 = new CNA();

        $cna_70->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_70->tags = [
            null,
        ];

        $cna_71 = new CNA();

        $cna_71->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_71->tags = [
            '',
        ];

        $cna_72 = new CNA();

        $cna_72->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_72->tags = [
            'disputed',
            '',
        ];

        $cna_73 = new CNA();

        $cna_73->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_73->tags = [
            '123',
            'disputed',
        ];

        $cna_74 = new CNA();

        $cna_74->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_74->taxonomyMappings = [];

        $cna_75 = new CNA();

        $cna_75->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_75->taxonomyMappings = [
            null,
        ];

        $cna_76 = new CNA();

        $cna_76->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_76->taxonomyMappings = [
            true,
        ];

        $cna_77 = new CNA();

        $cna_77->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_77->taxonomyMappings = [
            null,
            ...provide_valid_taxonomy_mappings(),
        ];

        $cna_78 = new CNA();

        $cna_78->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_78->taxonomyMappings = provide_invalid_taxonomy_mappings();

        $cna_79 = new CNA();

        $cna_79->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_79->datePublic = '123';

        $cna_80 = new CNA();

        $cna_80->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_80->dateAssigned = '123';

        $cna_81 = new CNA();

        $cna_81->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_81->rejectedReasons = [];

        $cna_82 = new CNA();

        $cna_82->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_82->rejectedReasons = [
            null,
        ];

        $cna_83 = new CNA();

        $cna_83->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_83->rejectedReasons = [
            true,
        ];

        $cna_84 = new CNA();

        $cna_84->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_84->rejectedReasons = [
            null,
            ...provide_valid_descriptions(),
        ];

        $cna_85 = new CNA();

        $cna_85->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_85->rejectedReasons = provide_invalid_descriptions();

        $cna_86 = new CNA();

        $cna_86->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_86->replacedBy = [];

        $cna_87 = new CNA();

        $cna_87->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_87->replacedBy = [
            null,
        ];

        $cna_88 = new CNA();

        $cna_88->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_88->replacedBy = [
            true,
        ];

        $cna_89 = new CNA();

        $cna_89->providerMetadata = provide_valid_provider_metadata()[0];
        $cna_89->replacedBy = [
            '123',
        ];

        return [
            $cna_0,
            $cna_1,
            $cna_2,
            $cna_3,
            $cna_4,
            $cna_5,
            $cna_6,
            $cna_7,
            $cna_8,
            $cna_9,
            $cna_10,
            $cna_11,
            $cna_12,
            $cna_13,
            $cna_14,
            $cna_15,
            $cna_16,
            $cna_17,
            $cna_18,
            $cna_19,
            $cna_20,
            $cna_21,
            $cna_22,
            $cna_23,
            $cna_24,
            $cna_25,
            $cna_26,
            $cna_27,
            $cna_28,
            $cna_29,
            $cna_30,
            $cna_31,
            $cna_32,
            $cna_33,
            $cna_34,
            $cna_35,
            $cna_36,
            $cna_37,
            $cna_38,
            $cna_39,
            $cna_40,
            $cna_41,
            $cna_42,
            $cna_43,
            $cna_44,
            $cna_45,
            $cna_46,
            $cna_47,
            $cna_48,
            $cna_49,
            $cna_50,
            $cna_51,
            $cna_52,
            $cna_53,
            $cna_54,
            $cna_55,
            $cna_56,
            $cna_57,
            $cna_58,
            $cna_59,
            $cna_60,
            $cna_61,
            $cna_62,
            $cna_63,
            $cna_64,
            $cna_65,
            $cna_66,
            $cna_67,
            $cna_68,
            $cna_69,
            $cna_70,
            $cna_71,
            $cna_72,
            $cna_73,
            $cna_74,
            $cna_75,
            $cna_76,
            $cna_77,
            $cna_78,
            $cna_79,
            $cna_80,
            $cna_81,
            $cna_82,
            $cna_83,
            $cna_84,
            $cna_85,
            $cna_86,
            $cna_87,
            $cna_88,
            $cna_89,
        ];
    }
}
