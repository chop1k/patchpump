<?php

declare(strict_types=1);

namespace App\Console\Output\CVE;

use App\Console\Output\CVE\Find\NothingFoundHeader;
use App\Console\Output\CVE\Find\SuccessHeader;
use App\Console\Output\CVE\Find\SuccessTable;
use App\Console\Output\Style\Paragraph\ParagraphStyle;
use App\Console\Output\Style\Separator\SectionSeparator;
use App\Persistence\Document\CVE\Record;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ------------------------------------
 * Searching for cve with 4 criteria...
 * ------------------------------------
 * ++++++++++++++++++++++++++++++++++++++++++++++++
 * index      name         value
 * ++++++++++++++++++++++++++++++++++++++++++++++++
 * 0          id           CVE-2014-132434
 *            title        SQL Injection in some shit
 *            assigner     MITRE (1234-1223234-12348924824-1212134343)
 *            state        PUBLISHED
 *            updated_at   2202-33-12T12:43:43
 *            published_at 2202-33-12T12:43:43
 *            assigned_at  2202-33-12T12:43:43
 * 1          id           CVE-2014-132434
 *            title        SQL Injection in some shit
 *            assigner     MITRE (1234-1223234-12348924824-1212134343)
 *            state        PUBLISHED
 *            updated_at   2202-33-12T12:43:43
 *            published_at 2202-33-12T12:43:43
 *            assigned_at  2202-33-12T12:43:43
 * ++++++++++++++++++++++++++++++++++++++++++++++++
 * Found total of 2 records.
 * ++++++++++++++++++++++++++++++++++++++++++++++++.
 */
final readonly class Find
{
    private ParagraphStyle $paragraph;

    public function __construct(
        private OutputInterface $output,
    ) {
        $separator = new SectionSeparator(80, '+');

        $this->paragraph = new ParagraphStyle(
            $separator,
            $this->output,
        );
    }

    public function nothingFound(): void
    {
        $header = new NothingFoundHeader($this->paragraph);

        $header->render();
    }

    public function searchStart(): void
    {
        $header = new SuccessHeader($this->paragraph);

        $header->render();

        $this->paragraph->startSection();
    }

    public function searchEnd(): void
    {
        $this->paragraph->endSection();
    }

    public function recordFound(Record $record): void
    {
        $table = new SuccessTable(
            $this->output,
            $record,
        );

        $table->render();
    }
}
