<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use App\Persistence\Enum\CVE\ApplicabilityOperator;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class CPEApplicability
{
    #[ODM\Field]
    private ?int $operator = null;

    #[ODM\Field]
    private ?bool $negate = null;

    /**
     * @var Collection<non-negative-int, CPENode>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $nodes = null;

    public function getOperator(): ?ApplicabilityOperator
    {
        return ApplicabilityOperator::from($this->operator);
    }

    public function setOperator(?ApplicabilityOperator $operator): self
    {
        if (null === $operator) {
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

    /**
     * @return Collection<non-negative-int, CPENode>|null
     */
    public function getNodes(): ?Collection
    {
        return $this->nodes;
    }

    /**
     * @param Collection<non-negative-int, CPENode>|null $nodes
     */
    public function setNodes(?Collection $nodes): self
    {
        $this->nodes = $nodes;

        return $this;
    }
}
