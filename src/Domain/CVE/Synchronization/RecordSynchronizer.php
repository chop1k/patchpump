<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization;

use App\Domain\CVE\Mapping\RecordMapper;
use App\Domain\CVE\Synchronization\Contracts\RecordComparatorInterface;
use App\Domain\CVE\Synchronization\Contracts\RecordLocatorInterface;
use App\Domain\CVE\Schema as Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Document\CVE\Record;
use App\Persistence\Repository\Document\RecordRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class RecordSynchronizer
{

    public function __construct(
//        private EventDispatcherInterface $eventDispatcher,
        private readonly RecordLocatorInterface $recordLocator,
        private readonly RecordComparatorInterface $comparator,
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly DocumentManager $documentManager,
    ) {
    }

    /**
     * @param mixed $source
     *
     * @return array{
     *     0: Record[],
     *     1: Record[],
     * }
     *
     * @throws LockException
     * @throws MappingException
     */
    public function synchronize(mixed $source): array
    {
        // synchronization start event

        $updated = [];
        $created = [];

        foreach ($this->recordLocator->locateRecord($source) as $json) {
            // record located event

            if ($json === null) {
                break;
            }

            $new = RecordMapper::mapSchemaToPersistence(
                $this->getValidatedSchema($json),
            );

            $old = $this->documentManager->getRepository(Persistence\Record::class)
                ->find($new->getId());

            if ($old === null) {
                // persist

                $created[] = $new;

                continue;
            }

            $swap = $this->comparator->compare($old, $new);

            if ($swap) {
                // call db

                $updated[] = $new;
            }
        }

        // synchronization end event

        return [
            $updated,
            $created,
        ];
    }

    private function getValidatedSchema(string $json): Schema\Record
    {
        $schema = $this->serializer->deserialize($json, Schema\Record::class, 'json');

        // record deserialized event

        $errors = $this->validator->validate($schema);

        if (count($errors) > 0) {
            // validation failure event

            throw new ValidationFailedException($schema, $errors);
        }

        // validation successful event

        if ($schema->cveMetadata?->cveId === null) {
            throw new \LogicException('Somehow cve metadata is null');
        }

        return $schema;
    }
}