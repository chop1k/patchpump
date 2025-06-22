<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\CNA;
use Carbon\Carbon;
use Carbon\Language;
use DateTimeInterface;

final class CNAProvider
{
    public static function provideValid(): array
    {
        $cna_0 = new CNA();

        $cna_0->providerMetadata = ProviderMetadataProvider::provideValid()[0];

        $cna_1 = new CNA();

        $cna_1->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_1->title = '123';

        $cna_2 = new CNA();

        $cna_2->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_2->descriptions = DescriptionProvider::provideValid();

        $cna_3 = new CNA();

        $cna_3->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_3->affected = AffectedProvider::provideValid();

        $cna_4 = new CNA();

        $cna_4->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_4->cpeApplicability = CPEApplicabilityProvider::provideValid();

        $cna_5 = new CNA();

        $cna_5->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_5->problems = ProblemTypeProvider::provideValid();

        $cna_6 = new CNA();

        $cna_6->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_6->references = ReferenceProvider::provideValid();

        $cna_7 = new CNA();

        $cna_7->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_7->impacts = ImpactProvider::provideValid();

        $cna_8 = new CNA();

        $cna_8->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_8->metrics = MetricProvider::provideValid();

        $cna_9 = new CNA();

        $cna_9->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_9->configurations = DescriptionProvider::provideValid();

        $cna_10 = new CNA();

        $cna_10->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_10->workarounds = DescriptionProvider::provideValid();

        $cna_11 = new CNA();

        $cna_11->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_11->solutions = DescriptionProvider::provideValid();

        $cna_12 = new CNA();

        $cna_12->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_12->exploits = DescriptionProvider::provideValid();

        $cna_13 = new CNA();

        $cna_13->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_13->timeline = TimelineProvider::provideValid();

        $cna_14 = new CNA();

        $cna_14->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_14->credits = CreditProvider::provideValid();

        $cna_15 = new CNA();

        $cna_15->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_15->source = [
            'a' => 'b',
            '1' => 2,
            '3' => true,
            'j' => new \stdClass(),
        ];

        $cna_16 = new CNA();

        $cna_16->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_16->tags = [
            'x_123',
        ];

        $cna_17 = new CNA();

        $cna_17->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_17->tags = [
            'disputed',
        ];

        $cna_18 = new CNA();

        $cna_18->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_18->tags = [
            'x_',
        ];

        $cna_19 = new CNA();

        $cna_19->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_19->tags = [
            'x_',
            'disputed',
        ];

        $cna_20 = new CNA();

        $cna_20->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_20->taxonomyMappings = TaxonomyMappingProvider::provideValid();

        $cna_21 = new CNA();

        $cna_21->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_21->datePublic = Carbon::now()->format(DateTimeInterface::ISO8601_EXPANDED);

        $cna_22 = new CNA();

        $cna_22->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_22->dateAssigned = Carbon::now()->format(DateTimeInterface::ISO8601_EXPANDED);

        $cna_23 = new CNA();

        $cna_23->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_23->rejectedReasons = DescriptionProvider::provideValid();

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

    public static function provideInvalid(): array
    {
        $cna_0 = new CNA();

        $cna_0->providerMetadata = ProviderMetadataProvider::provideInvalid()[0];

        $cna_1 = new CNA();

        $cna_1->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_1->title = '';

        $cna_2 = new CNA();

        $cna_2->providerMetadata = null;

        $cna_3 = new CNA();

        $cna_3->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_3->descriptions = [];

        $cna_4 = new CNA();

        $cna_4->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_4->descriptions = [
            null,
        ];

        $cna_5 = new CNA();

        $cna_5->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_5->descriptions = [
            true,
        ];

        $cna_6 = new CNA();

        $cna_6->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_6->descriptions = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_7 = new CNA();

        $cna_7->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_7->descriptions = DescriptionProvider::provideInvalid();

        $cna_8 = new CNA();

        $cna_8->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_8->affected = [];

        $cna_9 = new CNA();

        $cna_9->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_9->affected = [
            null,
        ];

        $cna_10 = new CNA();

        $cna_10->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_10->affected = [
            true,
        ];

        $cna_11 = new CNA();

        $cna_11->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_11->affected = [
            null,
            ...AffectedProvider::provideValid(),
        ];

        $cna_12 = new CNA();

        $cna_12->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_12->affected = AffectedProvider::provideInvalid();

        $cna_13 = new CNA();

        $cna_13->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_13->cpeApplicability = [
            null,
        ];

        $cna_14 = new CNA();

        $cna_14->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_14->cpeApplicability = [
            true,
        ];

        $cna_15 = new CNA();

        $cna_15->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_15->cpeApplicability = [
            null,
            ...CPEApplicabilityProvider::provideValid(),
        ];

        $cna_16 = new CNA();

        $cna_16->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_16->cpeApplicability = CPEApplicabilityProvider::provideInvalid();

        $cna_17 = new CNA();

        $cna_17->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_17->problems = [];

        $cna_18 = new CNA();

        $cna_18->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_18->problems = [
            null,
        ];

        $cna_19 = new CNA();

        $cna_19->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_19->problems = [
            true,
        ];

        $cna_20 = new CNA();

        $cna_20->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_20->problems = [
            null,
            ...ProblemTypeProvider::provideValid(),
        ];

        $cna_21 = new CNA();

        $cna_21->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_21->problems = ProblemTypeProvider::provideInvalid();

        $cna_22 = new CNA();

        $cna_22->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_22->references = [];

        $cna_23 = new CNA();

        $cna_23->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_23->references = [
            null,
        ];

        $cna_24 = new CNA();

        $cna_24->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_24->references = [
            true,
        ];

        $cna_25 = new CNA();

        $cna_25->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_25->references = [
            null,
            ...ReferenceProvider::provideValid(),
        ];

        $cna_26 = new CNA();

        $cna_26->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_26->references = ReferenceProvider::provideInvalid();

        $cna_27 = new CNA();

        $cna_27->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_27->impacts = [];

        $cna_28 = new CNA();

        $cna_28->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_28->impacts = [
            null,
        ];

        $cna_29 = new CNA();

        $cna_29->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_29->impacts = [
            true,
        ];

        $cna_30 = new CNA();

        $cna_30->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_30->impacts = [
            null,
            ...ImpactProvider::provideValid(),
        ];

        $cna_31 = new CNA();

        $cna_31->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_31->impacts = ImpactProvider::provideInvalid();

        $cna_32 = new CNA();

        $cna_32->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_32->metrics = [];

        $cna_33 = new CNA();

        $cna_33->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_33->metrics = [
            null,
        ];

        $cna_34 = new CNA();

        $cna_34->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_34->metrics = [
            true,
        ];

        $cna_35 = new CNA();

        $cna_35->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_35->metrics = [
            null,
            ...MetricProvider::provideValid(),
        ];

        $cna_36 = new CNA();

        $cna_36->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_36->metrics = MetricProvider::provideInvalid();

        $cna_37 = new CNA();

        $cna_37->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_37->configurations = [];

        $cna_38 = new CNA();

        $cna_38->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_38->configurations = [
            null,
        ];

        $cna_39 = new CNA();

        $cna_39->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_39->configurations = [
            true,
        ];

        $cna_40 = new CNA();

        $cna_40->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_40->configurations = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_41 = new CNA();

        $cna_41->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_41->configurations = DescriptionProvider::provideInvalid();

        $cna_42 = new CNA();

        $cna_42->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_42->workarounds = [];

        $cna_43 = new CNA();

        $cna_43->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_43->workarounds = [
            null,
        ];

        $cna_44 = new CNA();

        $cna_44->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_44->workarounds = [
            true,
        ];

        $cna_45 = new CNA();

        $cna_45->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_45->workarounds = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_46 = new CNA();

        $cna_46->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_46->workarounds = DescriptionProvider::provideInvalid();

        $cna_47 = new CNA();

        $cna_47->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_47->solutions = [];

        $cna_48 = new CNA();

        $cna_48->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_48->solutions = [
            null,
        ];

        $cna_49 = new CNA();

        $cna_49->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_49->solutions = [
            true,
        ];

        $cna_50 = new CNA();

        $cna_50->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_50->solutions = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_51 = new CNA();

        $cna_51->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_51->solutions = DescriptionProvider::provideInvalid();

        $cna_52 = new CNA();

        $cna_52->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_52->exploits = [];

        $cna_53 = new CNA();

        $cna_53->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_53->exploits = [
            null,
        ];

        $cna_54 = new CNA();

        $cna_54->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_54->exploits = [
            true,
        ];

        $cna_55 = new CNA();

        $cna_55->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_55->exploits = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_56 = new CNA();

        $cna_56->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_56->exploits = DescriptionProvider::provideInvalid();

        $cna_57 = new CNA();

        $cna_57->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_57->timeline = [];

        $cna_58 = new CNA();

        $cna_58->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_58->timeline = [
            null,
        ];

        $cna_59 = new CNA();

        $cna_59->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_59->timeline = [
            true,
        ];

        $cna_60 = new CNA();

        $cna_60->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_60->timeline = [
            null,
            ...TimelineProvider::provideValid(),
        ];

        $cna_61 = new CNA();

        $cna_61->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_61->timeline = TimelineProvider::provideInvalid();

        $cna_62 = new CNA();

        $cna_62->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_62->credits = [];

        $cna_63 = new CNA();

        $cna_63->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_63->credits = [
            null,
        ];

        $cna_64 = new CNA();

        $cna_64->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_64->credits = [
            true,
        ];

        $cna_65 = new CNA();

        $cna_65->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_65->credits = [
            null,
            ...CreditProvider::provideValid(),
        ];

        $cna_66 = new CNA();

        $cna_66->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_66->credits = CreditProvider::provideInvalid();

        $cna_67 = new CNA();

        $cna_67->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_67->source = [];

        $cna_68 = new CNA();

        $cna_68->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_68->tags = [];

        $cna_69 = new CNA();

        $cna_69->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_69->tags = [
            true,
        ];

        $cna_70 = new CNA();

        $cna_70->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_70->tags = [
            null,
        ];

        $cna_71 = new CNA();

        $cna_71->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_71->tags = [
            '',
        ];

        $cna_72 = new CNA();

        $cna_72->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_72->tags = [
            'disputed',
            '',
        ];

        $cna_73 = new CNA();

        $cna_73->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_73->tags = [
            '123',
            'disputed',
        ];

        $cna_74 = new CNA();

        $cna_74->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_74->taxonomyMappings = [];

        $cna_75 = new CNA();

        $cna_75->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_75->taxonomyMappings = [
            null,
        ];

        $cna_76 = new CNA();

        $cna_76->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_76->taxonomyMappings = [
            true,
        ];

        $cna_77 = new CNA();

        $cna_77->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_77->taxonomyMappings = [
            null,
            ...TaxonomyMappingProvider::provideValid(),
        ];

        $cna_78 = new CNA();

        $cna_78->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_78->taxonomyMappings = TaxonomyMappingProvider::provideInvalid();

        $cna_79 = new CNA();

        $cna_79->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_79->datePublic = '123';

        $cna_80 = new CNA();

        $cna_80->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_80->dateAssigned = '123';

        $cna_81 = new CNA();

        $cna_81->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_81->rejectedReasons = [];

        $cna_82 = new CNA();

        $cna_82->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_82->rejectedReasons = [
            null,
        ];

        $cna_83 = new CNA();

        $cna_83->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_83->rejectedReasons = [
            true,
        ];

        $cna_84 = new CNA();

        $cna_84->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_84->rejectedReasons = [
            null,
            ...DescriptionProvider::provideValid(),
        ];

        $cna_85 = new CNA();

        $cna_85->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_85->rejectedReasons = DescriptionProvider::provideInvalid();

        $cna_86 = new CNA();

        $cna_86->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_86->replacedBy = [];

        $cna_87 = new CNA();

        $cna_87->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_87->replacedBy = [
            null,
        ];

        $cna_88 = new CNA();

        $cna_88->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_88->replacedBy = [
            true,
        ];

        $cna_89 = new CNA();

        $cna_89->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_89->replacedBy = [
            '123'
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