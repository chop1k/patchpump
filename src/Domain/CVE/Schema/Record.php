<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

final class Record
{
    #[Assert\NotNull]
    #[Assert\IdenticalTo('CVE_RECORD')]
    public ?string $dataType = null;

    #[Assert\NotNull]
    #[Assert\IdenticalTo('5.1.1')]
    public ?string $dataVersion = null;

    #[Assert\NotNull]
    public ?RecordMetadata $cveMetadata = null;

    #[Assert\NotNull]
    public ?RecordContainers $containers = null;
}
