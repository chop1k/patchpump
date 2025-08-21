<?php

declare(strict_types=1);

namespace App\Console\Output\CVE;

use App\Console\Output\Common\Separator;
use App\Console\Output\CVE\Remove\NothingChangedHeader;
use App\Console\Output\CVE\Remove\NothingChangedTable;
use App\Console\Output\CVE\Remove\SuccessHeader;
use App\Console\Output\CVE\Remove\SuccessTable;
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
final readonly class Remove
{
    public function __construct(
        private OutputInterface $output,
    ) {
    }

    public function nothingToRemove(array $notFound): void
    {
        $this->separator()->render();
        $this->nothingHeader($notFound)->render();
        $this->separator()->render();
        $this->nothingTable($notFound)->render();
        $this->separator()->render();
    }

    /**
     * @param string[] $removed
     */
    public function success(array $removed): void
    {
        $this->separator()->render();
        $this->successHeader($removed)->render();
        $this->separator()->render();
        $this->successTable($removed)->render();
        $this->separator()->render();
    }

    private function separator(): Separator
    {
        return new Separator($this->output, 80, '+');
    }

    private function nothingHeader(array $notFound): NothingChangedHeader
    {
        return new NothingChangedHeader(
            $this->output,
            count($notFound),
        );
    }

    private function nothingTable(array $notFound): NothingChangedTable
    {
        return new NothingChangedTable(
            $this->output,
            $notFound,
        );
    }

    private function successHeader(array $removed): SuccessHeader
    {
        return new SuccessHeader(
            $this->output,
            count($removed),
        );
    }

    private function successTable(array $removed): SuccessTable
    {
        return new SuccessTable(
            $this->output,
            $removed,
        );
    }
}
