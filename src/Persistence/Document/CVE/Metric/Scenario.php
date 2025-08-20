<?php

declare(strict_types=1);

namespace App\Persistence\Document\CVE\Metric;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 */
#[ODM\EmbeddedDocument]
class Scenario
{
    public function __construct(
        #[ODM\Field]
        private string $language,

        #[ODM\Field]
        private string $content,
    ) {
    }

    public function language(): string
    {
        return $this->language;
    }

    public function content(): string
    {
        return $this->content;
    }
}
