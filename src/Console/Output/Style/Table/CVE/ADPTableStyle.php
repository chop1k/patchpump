<?php

declare(strict_types = 1);

namespace App\Console\Output\Style\Table\CVE;

use App\Console\Output\Style\Table\Common\TableStyle;
use App\Persistence\Document\CVE\ADP;

final readonly class ADPTableStyle
{
    use TableStyle;
    use CNACommon;

    public function __construct(
        private ADP $adp,
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
        return $this->keyIndexValue('title', 0, $this->adp->getTitle());
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
        return $this->keyIndexValue('public_at', 0, $this->adp->getPublicAt()?->format('c'));
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
        return $this->descriptionsField($this->adp->getDescriptions() ?? [])->toArray();
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
        return $this->affectedField($this->adp->getAffected() ?? [])->toArray();
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
        return $this->metricsField($this->adp->getMetrics() ?? [])->toArray();
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
        return $this->creditsField($this->adp->getCredits() ?? [])->toArray();
    }
}