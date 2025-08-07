<?php

declare(strict_types=1);

namespace App\Console\Output\CVE;

use App\Console\Output\Style\Table\CVE\ADPTableStyle;
use App\Console\Output\Style\Table\CVE\CNAPublishedTableStyle;
use App\Console\Output\Style\Table\CVE\CNARejectedTableStyle;
use App\Console\Output\Style\Table\CVE\MetadataTableStyle;
use App\Persistence\Document\CVE\PublishedCNA;
use App\Persistence\Document\CVE\Record;
use App\Persistence\Document\CVE\RejectedCNA;
use Symfony\Component\Console\Style\SymfonyStyle;

final readonly class ShowOutput
{
    private const KeyValueHeaders = [
        'field',
        'value',
    ];

    private const KeyIndexValueHeaders = [
        'field',
        'index',
        'value',
    ];

    public function __construct(
        private SymfonyStyle $style,
    ) {
    }

    public function notFound(string $value): void
    {
        $this->style->error(sprintf('No CVE records found for id "%s"', $value));
    }

    private function metadataSection(Record $record): void
    {
        $this->style->section('Metadata');

        $table = $this->style->createTable();

        $table->setHeaders(self::KeyValueHeaders);

        $style = new MetadataTableStyle($record, $this->style->getVerbosity());

        $rows = array_merge(
            $style->id(),
            $style->state(),
            $style->publishedAt(),
            $style->rejectedAt(),
            $style->reservedAt(),
            $style->updatedAt(),
            $style->assigner(),
        );

        foreach ($rows as $row) {
            $table->addRow($row);
        }

        $table->render();
    }

    private function cnaSection(Record $record): void
    {
        $cna = $record->getPublishedCNA();

        if (null !== $cna) {
            $this->cnaPublishedSection($cna);

            return;
        }

        $cna = $record->getRejectedCNA();

        if (null !== $cna) {
            $this->cnaRejectedSection($cna);
        }
    }

    private function cnaPublishedSection(PublishedCNA $cna): void
    {
        $this->style->section('Information from CNA');

        $table = $this->style->createTable();

        $table->setHeaders(self::KeyIndexValueHeaders);

        $style = new CNAPublishedTableStyle($cna, $this->style->getVerbosity());

        $rows = array_merge(
            $style->title(),
            $style->publicAt(),
            $style->assignedAt(),
            $style->descriptions(),
            $style->affected(),
            $style->metrics(),
            $style->credits(),
        );

        foreach ($rows as $row) {
            $table->addRow($row);
        }

        $table->render();
    }

    private function cnaRejectedSection(RejectedCNA $cna): void
    {
        $this->style->section('Information from CNA');

        $table = $this->style->createTable();

        $table->setHeaders(self::KeyIndexValueHeaders);

        $style = new CNARejectedTableStyle($cna, $this->style->getVerbosity());

        $rows = array_merge(
            $style->rejectedBy(),
            $style->rejectedReasons(),
            $style->replacedBy(),
        );

        foreach ($rows as $row) {
            $table->addRow($row);
        }

        $table->render();
    }

    private function adpSection(Record $record): void
    {
        foreach ($record->getAdp() ?? [] as $i => $adp) {
            $text = sprintf('Information from ADP (#%d)', $i);

            $this->style->section($text);

            $table = $this->style->createTable();

            $table->setHeaders(self::KeyIndexValueHeaders);

            $style = new ADPTableStyle($adp, $this->style->getVerbosity());

            $rows = array_merge(
                $style->title(),
                $style->publicAt(),
                $style->descriptions(),
                $style->affected(),
                $style->metrics(),
                $style->credits(),
            );

            foreach ($rows as $row) {
                $table->addRow($row);
            }

            $table->render();
        }
    }

    public function recordFound(Record $record): void
    {
        $this->metadataSection($record);
        $this->cnaSection($record);
        $this->adpSection($record);
    }
}
