<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class ProblemMapper
{
    public static function mapSchemaToPersistence(Schema\ProblemType $schema): array
    {
        $filtered = array_filter(
            $schema->descriptions ?? [],
            static fn (mixed $desc) => is_object($desc) && Schema\ProblemDescription::class === get_class($desc),
        );

        return array_map(static function (Schema\ProblemDescription $problem) {
            $persistence = new Persistence\Problem();

            $persistence->setLanguage($problem->lang);
            $persistence->setContent($problem->description);
            $persistence->setType($problem->type);
            $persistence->setCwe($problem->cweId);

            if (null !== $problem->references) {
                $filtered = array_filter(
                    $problem->references,
                    static fn (mixed $ref) => is_object($ref) && Schema\Reference::class === get_class($ref),
                );

                $persistence->setReferences(
                    new ArrayCollection(
                        array_map(ReferenceMapper::mapSchemaToPersistence(...), $filtered),
                    ),
                );
            }

            return $persistence;
        }, $filtered);
    }
}
