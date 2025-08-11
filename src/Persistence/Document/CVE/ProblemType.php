<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class ProblemType
{
    /**
     * @var Collection<non-negative-int, ProblemDescription>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $descriptions = null;

    /**
     * @return Collection<non-negative-int, ProblemDescription>|null
     */
    public function getDescriptions(): ?Collection
    {
        return $this->descriptions;
    }

    /**
     * @param Collection<non-negative-int, ProblemDescription>|null $descriptions
     */
    public function setDescriptions(?Collection $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }
}
