<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\CVE;

use App\Console\Output\Style\Table\Common\TableField;
use App\Console\Output\Style\Table\Common\TableStyle;
use App\Persistence\Document\CVE\RejectedCNA;

final readonly class CNARejectedTableStyle
{
    use TableStyle;

    public function __construct(
        private RejectedCNA $cna,
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
    public function rejectedBy(): array
    {
        $provider = $this->cna->getProvider();

        if ($provider === null) {
            return [];
        }

        $field = new TableField('rejected_by');

        $name = $provider->getOrgName();

        if ($name !== null) {
            $timestamp = $provider->getUpdatedAt();

            if ($timestamp !== null) {
                $string = sprintf('%s (last updated %s)', $name, $timestamp->format('c'));
            } else {
                $string = $name;
            }

            $field = $field->addLine(0, $string);
        }

        return $field->toArray();
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function rejectedReasons(): array
    {
        $field = new TableField('reasons');

        foreach ($this->cna->getReasons() ?? [] as $i => $description) {
            if ($description === null) {
                continue;
            }

            $content = $description->getContent();

            if ($content === null) {
                continue;
            }

            $field = $field->addLine($i, $content);
        }

        return $field->toArray();
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     *     2: string,
     * }[]
     */
    public function replacedBy(): array
    {
        $field = new TableField('replaced_by');

        foreach ($this->cna->getReplacedBy() ?? [] as $cve) {
            if ($cve === null) {
                continue;
            }

            $field = $field->addLine(0, $cve);
        }

        return $field->toArray();
    }
}