<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Rejected as Data;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Rejected as Assigner;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Rejected as Metadata;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends AbstractRecord<Metadata, Assigner, Data>
 */
#[ODM\Document(collection: 'cve_records')]
class Rejected extends AbstractRecord
{
}
