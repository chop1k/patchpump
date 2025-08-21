<?php

declare(strict_types=1);

namespace App\Console\Action\CVE;

use App\Console\Input\CVE as Input;
use App\Console\Output\CVE as Output;
use Doctrine\ODM\MongoDB\DocumentManager;

final readonly class Remove
{
    public function __construct(
        private DocumentManager $documentManager,
        private Input\Remove $input,
        private Output\Remove $output,
    ) {
    }

    public function execute(): void
    {
        $toRemove = $this->input->values();

        $process = new Remove\Process($this->documentManager, $toRemove);

        $removed = $process
            ->findRecords()
            ->remove();

        $notFound = array_values(
            array_diff($toRemove, $removed),
        );

        if (count($notFound) > 0) {
            $this->output->nothingToRemove($notFound);
        }

        if (count($removed) > 0) {
            $this->output->success($removed);
        }
    }
}
