<?php

declare(strict_types=1);

namespace App\Tests\Common\Providers\Domain\CVE\Schema;

use App\Domain\CVE\Schema\TaxonomyRelation;

final class TaxonomyRelationProvider
{
    /**
     * @return TaxonomyRelation[]
     */
    public static function provideValid(): array
    {
        $relation_0 = new TaxonomyRelation();

        $relation_0->taxonomyId = '123';
        $relation_0->relationshipName = '123';
        $relation_0->relationshipValue = '124';

        return [
            $relation_0,
        ];
    }

    /**
     * @return TaxonomyRelation[]
     */
    public static function provideInvalid(): array
    {
        $relation_0 = new TaxonomyRelation();

        $relation_0->taxonomyId = null;
        $relation_0->relationshipName = '123';
        $relation_0->relationshipValue = '124';

        $relation_1 = new TaxonomyRelation();

        $relation_1->taxonomyId = '123';
        $relation_1->relationshipName = null;
        $relation_1->relationshipValue = '124';

        $relation_2 = new TaxonomyRelation();

        $relation_2->taxonomyId = '123';
        $relation_2->relationshipName = '123';
        $relation_2->relationshipValue = null;

        $relation_3 = new TaxonomyRelation();

        $relation_3->taxonomyId = '';
        $relation_3->relationshipName = '123';
        $relation_3->relationshipValue = '213';

        $relation_4 = new TaxonomyRelation();

        $relation_4->taxonomyId = '123';
        $relation_4->relationshipName = '';
        $relation_4->relationshipValue = '213';

        $relation_5 = new TaxonomyRelation();

        $relation_5->taxonomyId = '123';
        $relation_5->relationshipName = '';
        $relation_5->relationshipValue = '213';

        $relation_6 = new TaxonomyRelation();

        $relation_6->taxonomyId = '123';
        $relation_6->relationshipName = '123';
        $relation_6->relationshipValue = '';

        return [
            $relation_0,
            $relation_1,
            $relation_2,
            $relation_3,
            $relation_4,
            $relation_5,
            $relation_6,
        ];
    }
}