<?php

declare(strict_types=1);

namespace App\Console\Output\Style;

use App\Persistence\Document\CVE\Record;
use App\Persistence\Enum\CVE\RecordState;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * php bin/console pp:cve:show CVE-2023-122312 -v
 * current environment: prod
 * ********************
 * Metadata
 * ***********************
 * name             value
 * id                   CVE-2025-123122
 * state              Published
 * ******
 * Information from CNA
 * ****
 * name                 index value
 * title                      felrfjerkferfer
 * public_at                  2023-02-30 ...
 * assigned_at                2022-03-10 ...
 * descriptions         0     kehfjkrefjkehfjkerkferkjfhkjfhekfhrekfrfjherfjhjhkfef
 *                      1     ооарулакоруклпрукр
 * affected             0     vendor: Microsoft
 *                            product: Outlook
 *                            platforms:
 *                                1
 *                                2
 *                                3
 *                      1     package: https://123
 *                            name: axios
 *                            platforms:
 *                                1
 *                                2
 *                                3
 *                            cpe:
 *                                cpe1
 *                                cpe2
 * references           0     type: name (url)
 *                      1     type: name (url)
 * metrics              0     cvss3.0:123
 *                      1     unknown format
 * credits              0     type: name
 * tags                 0     123
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
final readonly class CVETableStyle
{
    public function __construct(
        private Record $record,
        private int $verbosity,
    ) {
    }

    public function metadata(): array
    {
    }


    private function normal(Record $record, Table $table): void
    {
        $table->addRow(['id', $record->getId()]);

        $metadata = $record->getMetadata();

        $state = $metadata->getState();

        if ($state !== null) {
            $table->addRow(['state', $state->name]);
        }

        if ($metadata->getReservedAt() !== null) {
            $table->addRow(['reserved_at', $metadata->getReservedAt()->format('c')]);
        }

        if ($metadata->getUpdatedAt() !== null) {
            $table->addRow(['updated_at', $metadata->getUpdatedAt()->format('c')]);
        }

        if ($state === RecordState::Published) {
            $published = $metadata->getPublishedAt();

            if ($published !== null) {
                $table->addRow(['published_at', $published->format('c')]);
            }
        }

        if ($state === RecordState::Rejected) {
            $rejected = $metadata->getRejectedAt();

            if ($rejected !== null) {
                $table->addRow(['rejected_at', $rejected->format('c')]);
            }
        }

        $assigner = $record->getAssigner();

        if ($assigner === null) {
            return;
        }

        if ($assigner->getOrgName() !== null) {
            $table->addRow(['assigner', $assigner->getOrgName()]);
        }
    }

    private function verbose(Record $record, Table $table): void
    {
        $published = $record->getPublishedCNA();

        if ($published !== null) {
            $title = $published->getTitle();

            if ($title !== null) {
                $table->addRow(['title', $title]);
            }

            $metrics = $published->getMetrics();

            if ($metrics !== null) {
                foreach ($metrics as $metric) {
                    $table->addRow(['metrics', $metric->getCvss()]);
                }
            }
        }
    }

    private function veryVerbose(Record $record, Table $table): void
    {
    }

    private function debug(Record $record, Table $table): void
    {
    }
}