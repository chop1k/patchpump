<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source\Directory;

use App\Domain\CVE\Mapping\RecordMapper;
use App\Domain\CVE\Schema\Record;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class DirectoryIteration
{
    private const IdPattern = '/^CVE-\\d{4}-\\d{4,}$/';

    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
        private string $path,
    ) {
    }

    public function valid(): bool
    {
        return Path::getExtension($this->path) === 'json' && preg_match(self::IdPattern, Path::getFilenameWithoutExtension($this->path));
    }

    public function record(string $raw): DirectoryRecord
    {
        $record = $this->serializer->deserialize($raw, Record::class, 'json');

        $errors = $this->validator->validate($record);

        if (count($errors) > 0) {
            return new DirectoryRecord(null);
        }

        return new DirectoryRecord(
            RecordMapper::mapSchemaToPersistence($record),
        );
    }
}