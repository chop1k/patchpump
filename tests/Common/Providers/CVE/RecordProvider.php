<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\CVE;

use App\Domain\CVE\Schema\CNA;
use App\Domain\CVE\Schema\Record;
use App\Domain\CVE\Schema\RecordContainers;
use App\Domain\CVE\Schema\RecordMetadata;

final class RecordProvider
{
    /**
     * @return Record[]
     */
    public static function provideValid(): array
    {
        $metadata_0 = new RecordMetadata();

        $metadata_0->cveId = 'CVE-04-12';
        $metadata_0->state = 'PUBLISHED';
        $metadata_0->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $metadata_1 = new RecordMetadata();

        $metadata_1->cveId = 'CVE-04-12';
        $metadata_1->state = 'REJECTED';
        $metadata_1->assignerOrgId = 'd7cd2984-4694-4d3f-a1fc-f96a98118d12';

        $cna_0 = new CNA();

        $cna_0->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_0->affected = AffectedProvider::provideValid();
        $cna_0->references = ReferenceProvider::provideValid();

        $cna_1 = new CNA();

        $cna_1->providerMetadata = ProviderMetadataProvider::provideValid()[0];
        $cna_1->rejectedReasons = DescriptionProvider::provideValid();

        $containers_0 = new RecordContainers();

        $containers_0->cna = $cna_0;

        $containers_1 = new RecordContainers();

        $containers_1->cna = $cna_0;
        $containers_1->adp = [
            $cna_0,
        ];

        $containers_2 = new RecordContainers();

        $containers_2->cna = $cna_1;

        $record_0 = new Record();

        $record_0->dataType = 'CVE_RECORD';
        $record_0->dataVersion = '5.1.1';
        $record_0->cveMetadata = $metadata_0;
        $record_0->containers = $containers_0;

        $record_1 = new Record();

        $record_1->dataType = 'CVE_RECORD';
        $record_1->dataVersion = '5.1.1';
        $record_1->cveMetadata = $metadata_0;
        $record_1->containers = $containers_1;

        $record_2 = new Record();

        $record_2->dataType = 'CVE_RECORD';
        $record_2->dataVersion = '5.1.1';
        $record_2->cveMetadata = $metadata_1;
        $record_2->containers = $containers_2;

        return [
            $record_0,
            $record_1,
            $record_2,
        ];
    }

    /**
     * @return Record[]
     */
    public static function provideInvalid(): array
    {
        $record_0 = new Record();

        $record_0->dataType = null;
        $record_0->dataVersion = '5.1.1';
        $record_0->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_0->containers = RecordContainersProvider::provideValid()[0];

        $record_1 = new Record();

        $record_1->dataType = '';
        $record_1->dataVersion = '5.1.1';
        $record_1->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_1->containers = RecordContainersProvider::provideValid()[0];

        $record_2 = new Record();

        $record_2->dataType = 'CVE_RECORD';
        $record_2->dataVersion = '';
        $record_2->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_2->containers = RecordContainersProvider::provideValid()[0];

        $record_3 = new Record();

        $record_3->dataType = 'CVE_RECORD';
        $record_3->dataVersion = '5.1.1';
        $record_3->cveMetadata = RecordMetadataProvider::provideInvalid()[0];
        $record_3->containers = RecordContainersProvider::provideValid()[0];

        $record_4 = new Record();

        $record_4->dataType = 'CVE_RECORD';
        $record_4->dataVersion = '5.1.1';
        $record_4->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_4->containers = RecordContainersProvider::provideInvalid()[0];

        $record_5 = new Record();

        $record_5->dataType = 'CVE_RECORD';
        $record_5->dataVersion = null;
        $record_5->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_5->containers = RecordContainersProvider::provideValid()[0];

        $record_6 = new Record();

        $record_6->dataType = 'CVE_RECORD';
        $record_6->dataVersion = '5.1.1';
        $record_6->cveMetadata = null;
        $record_6->containers = RecordContainersProvider::provideValid()[0];

        $record_7 = new Record();

        $record_7->dataType = 'CVE_RECORD';
        $record_7->dataVersion = '5.1.1';
        $record_7->cveMetadata = RecordMetadataProvider::provideValid()[0];
        $record_7->containers = null;

        return [
            $record_0,
            $record_1,
            $record_2,
            $record_3,
            $record_4,
            $record_5,
            $record_6,
            $record_7,
        ];
    }
}