<?php

declare(strict_types=1);

use App\Domain\CVE\Schema\TaxonomyMapping;

if (false === function_exists('provide_valid_taxonomy_mappings')) {
    /**
     * @return TaxonomyMapping[]
     */
    function provide_valid_taxonomy_mappings(): array
    {
        $mapping_0 = new TaxonomyMapping();

        $mapping_0->taxonomyName = '123';
        $mapping_0->taxonomyRelations = provide_valid_taxonomy_relations();

        $mapping_1 = new TaxonomyMapping();

        $mapping_1->taxonomyName = '123';
        $mapping_1->taxonomyVersion = '124';
        $mapping_1->taxonomyRelations = provide_valid_taxonomy_relations();

        return [
            $mapping_0,
            $mapping_1,
        ];
    }
}

if (false === function_exists('provide_invalid_taxonomy_mappings')) {
    /**
     * @return TaxonomyMapping[]
     */
    function provide_invalid_taxonomy_mappings(): array
    {
        $mapping_0 = new TaxonomyMapping();

        $mapping_0->taxonomyName = null;
        $mapping_0->taxonomyRelations = provide_valid_taxonomy_relations();

        $mapping_1 = new TaxonomyMapping();

        $mapping_1->taxonomyName = '';
        $mapping_1->taxonomyRelations = provide_valid_taxonomy_relations();

        $mapping_2 = new TaxonomyMapping();

        $mapping_2->taxonomyName = '123';
        $mapping_2->taxonomyVersion = '';
        $mapping_2->taxonomyRelations = provide_valid_taxonomy_relations();

        $mapping_3 = new TaxonomyMapping();

        $mapping_3->taxonomyName = '123';
        $mapping_3->taxonomyRelations = provide_invalid_taxonomy_relations();

        $mapping_4 = new TaxonomyMapping();

        $mapping_4->taxonomyName = '123';
        $mapping_4->taxonomyRelations = [];

        $mapping_5 = new TaxonomyMapping();

        $mapping_5->taxonomyName = '123';
        $mapping_5->taxonomyRelations = [
            null,
        ];

        $mapping_6 = new TaxonomyMapping();

        $mapping_6->taxonomyName = '123';
        $mapping_6->taxonomyRelations = [
            true,
        ];

        $mapping_7 = new TaxonomyMapping();

        $mapping_7->taxonomyName = '123';
        $mapping_7->taxonomyRelations = [
            null,
            ...provide_valid_taxonomy_relations(),
        ];

        return [
            $mapping_0,
            $mapping_1,
            $mapping_2,
            $mapping_3,
            $mapping_4,
            $mapping_5,
            $mapping_6,
            $mapping_7,
        ];
    }
}
