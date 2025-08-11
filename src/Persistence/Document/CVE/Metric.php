<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 */
#[ODM\EmbeddedDocument]
class Metric
{
    /**
     * @var string[]|null
     */
    #[ODM\Field(type: 'collection')]
    private ?array $cvss = null;

    #[ODM\EmbedOne]
    private ?MetricOther $other = null;

    /**
     * @var Collection<non-negative-int, MetricScenario>|null
     */
    #[ODM\EmbedMany]
    private ?Collection $scenarios = null;

    /**
     * @return string[]|null
     */
    public function getCvss(): ?array
    {
        return $this->cvss;
    }

    /**
     * @param string[]|null $cvss
     */
    public function setCvss(?array $cvss): self
    {
        $this->cvss = $cvss;

        return $this;
    }

    public function getOther(): ?MetricOther
    {
        return $this->other;
    }

    public function setOther(?MetricOther $other): self
    {
        $this->other = $other;

        return $this;
    }

    /**
     * @return Collection<non-negative-int, MetricScenario>|null
     */
    public function getScenarios(): ?Collection
    {
        return $this->scenarios;
    }

    /**
     * @param Collection<non-negative-int, MetricScenario>|null $scenarios
     */
    public function setScenarios(?Collection $scenarios): self
    {
        $this->scenarios = $scenarios;

        return $this;
    }
}
