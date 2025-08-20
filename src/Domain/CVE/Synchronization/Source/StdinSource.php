<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Common\TextRecord;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Persistence\Document\CVE\Record;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @implements SourceInterface<Record>
 */
final readonly class StdinSource implements SourceInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
    ) {
    }

    public function generator(): \Generator
    {
        $text = file_get_contents('php://stdin');

        if (false === $text) {
            throw new \RuntimeException('Could not read from stdin');
        }

        $record = new TextRecord(
            $this->serializer,
            $this->validator,
            $text,
        );

        $record = $record
            ->serialize()
            ->validate()
            ->toPersistence();

        yield $record->id() => $record;
    }
}
