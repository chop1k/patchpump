<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Taxonomy;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Relation
{
    public function __construct(
        #[ODM\Field]
        private string $id,

        #[ODM\Field]
        private string $name,

        #[ODM\Field]
        private string $value,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }
}
