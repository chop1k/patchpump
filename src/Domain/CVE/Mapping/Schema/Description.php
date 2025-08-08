<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\ChaoticCollection;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\DescriptionType;

final readonly class Description
{
    public function __construct(
        private Schema\Description $schema,
        private DescriptionType $type,
    ) {
    }

    public function toPersistence(): Persistence\Description
    {
        $persistence = new Persistence\Description();

        $persistence->setType($this->type);
        $persistence->setLanguage($this->schema->lang);
        $persistence->setContent($this->schema->value);

        if (null !== $this->schema->supportingMedia) {
            $media = new ChaoticCollection(
                $this->schema->supportingMedia,
                $this->mapMedia(...),
            );

            $media = $media
                ->ensureInstanceOf(DescriptionMedia::class)
                ->map()
                ->toArrayCollection();

            $persistence->setMedia($media);
        }

        return $persistence;
    }

    private function mapMedia(Schema\DescriptionMedia $media): Persistence\DescriptionMedia
    {
        $mapping = new DescriptionMedia($media);

        return $mapping->toPersistence();
    }
}
