<?php

declare(strict_types=1);

namespace App\Domain\CVE\Schema;

use Symfony\Component\Validator\Constraints as Assert;

#[Assert\Cascade]
final class RecordContainers
{
    #[Assert\NotNull]
    public ?CNA $cna = null;

    /**
     * @var ADP[]|null
     */
    #[Assert\Length(min: 1)]
    public ?array $adp = null;
}