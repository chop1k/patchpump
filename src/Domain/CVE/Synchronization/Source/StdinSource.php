<?php

declare(strict_types=1);

namespace App\Domain\CVE\Synchronization\Source;

use App\Domain\CVE\Synchronization\Source\Common\TextRecord;
use App\Domain\Vulnerabilities\Synchronization\Contracts\SourceInterface;
use App\Infrastructure\Persistence\Storage\NoSQL\CVE\Record\AbstractRecord;
use Generator;
use Override;
use RuntimeException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @implements SourceInterface<AbstractRecord>
 */
final readonly class StdinSource implements SourceInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator,
    ) {
    }

    /**
     * @return Generator<string, AbstractRecord>
     */
    #[Override]
    public function generator(): Generator
    {
        $text = file_get_contents('php://stdin');

        if (false === $text) {
            throw new RuntimeException('Could not read from stdin');
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
