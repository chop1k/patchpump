<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class CPENode
{
    #[ODM\Field]
    public ?int $operator = null;

    #[ODM\Field]
    public ?bool $negate = null;

    /**
     * @var Collection<CPEMatch>|null
     */
    #[ODM\EmbedMany]
    public ?Collection $matches = null;

    public function getOperator(): ?ApplicabilityOperator
    {
        return ApplicabilityOperator::from($this->operator);
    }

    public function setOperator(?ApplicabilityOperator $operator): self
    {
        if ($operator === null) {
            $this->operator = null;

            return $this;
        }

        $this->operator = $operator->value;

        return $this;
    }

    public function getNegate(): ?bool
    {
        return $this->negate;
    }

    public function setNegate(?bool $negate): self
    {
        $this->negate = $negate;

        return $this;
    }

    public function getMatches(): ?Collection
    {
        return $this->matches;
    }

    public function setMatches(?Collection $matches): self
    {
        $this->matches = $matches;

        return $this;
    }
}