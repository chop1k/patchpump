<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

final class RecordContainers
{
    #[Assert\NotNull]
    #[Assert\AtLeastOneOf([
        new Assert\Sequentially([
            new Assert\Type(CNARejected::class),
            new Assert\When(
                expression: 'adp === null'
            )
        ]),
        new Assert\Sequentially([
            new Assert\Type(CNAPublished::class),
            new Assert\When(
                expression: 'adp !== null'
            )
        ])
    ])]
    public mixed $cna = null;

    public ?ADP $adp = null;
}