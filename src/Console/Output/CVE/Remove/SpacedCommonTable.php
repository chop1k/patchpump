<?php

declare(strict_types=1);

namespace App\Console\Output\CVE\Remove;

use App\Console\Output\Common\Padding;

abstract class SpacedCommonTable extends CommonTable
{
    protected function space(): Padding
    {
        return new Padding($this->output, 1);
    }

    #[\Override]
    public function render(): void
    {
        $this->space()->render();
        parent::render();
        $this->space()->render();
    }
}