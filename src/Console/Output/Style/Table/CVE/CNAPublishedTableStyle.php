<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\CVE;

use App\Console\Output\Style\Table\Common\TableStyle;
use App\Persistence\Document\CVE\PublishedCNA;

final readonly class CNAPublishedTableStyle
{
    use TableStyle;
    use CNACommon;

    public function __construct(
        private PublishedCNA $cna,
        private int $verbosity,
    ) {
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function title(): array
    {
        return $this->keyIndexValue('title', 0, $this->cna->getTitle());
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function publicAt(): array
    {
        return $this->keyIndexValue('public_at', 0, $this->cna->getPublicAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function assignedAt(): array
    {
        return $this->keyIndexValue('assigned_at', 0, $this->cna->getAssignedAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function descriptions(): array
    {
        return $this->descriptionsField($this->cna->getDescriptions() ?? [])->toArray();
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function affected(): array
    {
        return $this->affectedField($this->cna->getAffected() ?? [])->toArray();
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function metrics(): array
    {
        return $this->metricsField($this->cna->getMetrics() ?? [])->toArray();
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function credits(): array
    {
        return $this->creditsField($this->cna->getCredits() ?? [])->toArray();
    }
}