<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Metric;

use Doctrine\Common\Collections\Collection;
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
        #[ODM\EmbedOne(
            discriminatorField: '_type',
            discriminatorMap: [
                'cvss_2.0' => Value\CVSS20::class,
                'cvss_3.0' => Value\CVSS30::class,
                'cvss_3.1' => Value\CVSS31::class,
                'cvss_4.0' => Value\CVSS40::class,
                'other' => Value\Other::class,
            ]
        )]
        protected mixed $value,
        /**
         * @var Collection<non-negative-int, Scenario>|null $scenarios
         */
        #[ODM\EmbedMany(
            discriminatorField: '_type',
            discriminatorMap: [
                'scenario' => Scenario::class,
            ]
        )]
        protected ?Collection $scenarios,
    ) {
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function scenarios(): ?Collection
    {
        return $this->scenarios;
    }
}
