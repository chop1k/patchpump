<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Common\Description;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Container
{
    public function __construct(
        #[ODM\Field]
        private Type $type,

        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'description' => Description::class,
            ]
        )]
        private Description $description,
    ) {
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function description(): Description
    {
        return $this->description;
    }
}
