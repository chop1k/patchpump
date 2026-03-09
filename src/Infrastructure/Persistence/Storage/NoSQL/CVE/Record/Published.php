<?php

namespace App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record;

use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Data\Published as Data;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Assigner\Published as Assigner;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\Metadata\Published as Metadata;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @final
 *
 * @readonly
 *
 * @extends AbstractRecord<Metadata, Assigner, Data>
 */
#[ODM\Document(collection: 'cve_records')]
class Published extends AbstractRecord
{
}
