<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping;

use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\DescriptionType;
use Doctrine\Common\Collections\ArrayCollection;

final class DescriptionMapper
{
    private static function mapSchemaToPersistence(DescriptionType $type, ?Schema\Description $schema): ?Persistence\Description
    {
        if (null === $schema) {
            return null;
        }

        $persistence = new Persistence\Description();

        $persistence->setType($type);
        $persistence->setLanguage($schema->lang);
        $persistence->setContent($schema->value);

        if ($schema->supportingMedia !== null) {
            $persistence->setMedia(
                new ArrayCollection(
                    array_map(DescriptionMediaMapper::mapSchemaToPersistence(...), $schema->supportingMedia),
                ),
            );
        }

        return $persistence;
    }

    public static function mapSchemaPlainToPersistence(?Schema\Description $schema): ?Persistence\Description
    {
        return self::mapSchemaToPersistence(DescriptionType::Plain, $schema);
    }

    public static function mapSchemaConfigurationToPersistence(?Schema\Description $schema): ?Persistence\Description
    {
        return self::mapSchemaToPersistence(DescriptionType::Configuration, $schema);
    }


    public static function mapSchemaWorkaroundToPersistence(?Schema\Description $schema): ?Persistence\Description
    {
        return self::mapSchemaToPersistence(DescriptionType::Workaround, $schema);
    }

    public static function mapSchemaSolutionToPersistence(?Schema\Description $schema): ?Persistence\Description
    {
        return self::mapSchemaToPersistence(DescriptionType::Solution, $schema);
    }

    public static function mapSchemaExploitToPersistence(?Schema\Description $schema): ?Persistence\Description
    {
        return self::mapSchemaToPersistence(DescriptionType::Exploit, $schema);
    }
}