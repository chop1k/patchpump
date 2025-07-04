<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use Doctrine\Common\Collections\ArrayCollection;

final class ProblemMapper
{
    public static function mapSchemaToPersistence(?Schema\ProblemType $schema): ?array
    {
        if (null === $schema) {
            return null;
        }

        if ($schema->descriptions === null) {
            return null;
        }

        return array_map(function (Schema\ProblemDescription $problem) {
            $persistence = new Persistence\Problem();

            $persistence->setLanguage($problem->lang);
            $persistence->setContent($problem->description);
            $persistence->setType($problem->type);
            $persistence->setCwe($problem->cweId);

            if ($problem->references !== null) {
                $persistence->setReferences(
                    new ArrayCollection(
                        array_map(ReferenceMapper::mapSchemaToPersistence(...), $problem->references),
                    ),
                );
            }

            return $persistence;
        }, $schema->descriptions);
    }
}