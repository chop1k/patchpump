<?php

declare(strict_types=1);

namespace App\Console\Output\CVE;

use App\Console\Output\CVE\Remove\NothingChangedHeader;
use App\Console\Output\CVE\Remove\NothingChangedTable;
use App\Console\Output\CVE\Remove\SuccessHeader;
use App\Console\Output\CVE\Remove\SuccessTable;
use App\Console\Output\Style\Paragraph\ParagraphStyle;
use App\Console\Output\Style\Separator\SectionSeparator;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * Successfully removed 9 records:
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *     ___________________________________________________________
 *     Records
 *     ___________________________________________________________
 *     CVE-2041-21234, CVE-1234-1234, CVE-1234-1234, CVE-123-12344,
 *     CVE-2041-21234, CVE-1234-1234, CVE-1234-1234, CVE-123-12344,
 *     ___________________________________________________________
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++.
 */
final readonly class RemoveOutput
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

    public function nothingToRemove(array $notFound): void
    {
        $header = new NothingChangedHeader(
            $this->paragraph,
            count($notFound),
        );
        $table = new NothingChangedTable(
            $this->output,
            $this->paragraph,
            $notFound,
        );

        $header->render();

        $this->output->writeln('');

        $table->render();
    }

    /**
     * @param string[] $removed
     */
    public function success(array $removed): void
    {
        $header = new SuccessHeader(
            $this->paragraph,
            count($removed),
        );
        $table = new SuccessTable(
            $this->output,
            $this->paragraph,
            $removed,
        );

        $header->render();

        $this->output->writeln('');

        $table->render();
    }
}
