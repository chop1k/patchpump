<?php

declare(strict_types=1);

namespace App\Domain\CVE\Mapping\Schema;

use App\Domain\CVE\Mapping\Common\Timestamp;
use App\Domain\CVE\Schema;
use App\Persistence\Document\CVE as Persistence;
use App\Persistence\Enum\CVE\RecordState;

final readonly class RecordMetadata
{
    public function __construct(
        private Schema\RecordMetadata $schema,
    ) {
    }

    public function toPersistenceMetadata(): Persistence\RecordMetadata
    {
        $persistence = new Persistence\RecordMetadata();

        if ('published' === strtolower($this->schema->state ?? '')) {
            $persistence->setState(RecordState::Published);
        }

        if ('rejected' === strtolower($this->schema->state ?? '')) {
            $persistence->setState(RecordState::Rejected);
        }

        $persistence->setSerial($this->schema->serial);

        if (null !== $this->schema->datePublished) {
            $this->mapPublishedAt($persistence, $this->schema->datePublished);
        }
        if (null !== $this->schema->dateRejected) {
            $this->mapRejectedAt($persistence, $this->schema->dateRejected);
        }
        if (null !== $this->schema->dateUpdated) {
            $this->mapUpdatedAt($persistence, $this->schema->dateUpdated);
        }
        if (null !== $this->schema->dateReserved) {
            $this->mapReservedAt($persistence, $this->schema->dateReserved);
        }

        return $persistence;
    }

    private function mapPublishedAt(Persistence\RecordMetadata $persistence, string $timestamp): void
    {
        $timestamp = new Timestamp($timestamp);

        try {
            $persistence->setPublishedAt($timestamp->toDateTimeImmutable());
        } catch (\InvalidArgumentException) {
            $persistence->setPublishedAt(null);
        }
    }

    private function mapRejectedAt(Persistence\RecordMetadata $persistence, string $timestamp): void
    {
        $timestamp = new Timestamp($timestamp);

        try {
            $persistence->setRejectedAt($timestamp->toDateTimeImmutable());
        } catch (\InvalidArgumentException) {
            $persistence->setRejectedAt(null);
        }
    }

    private function mapUpdatedAt(Persistence\RecordMetadata $persistence, string $timestamp): void
    {
        $timestamp = new Timestamp($timestamp);

        try {
            $persistence->setUpdatedAt($timestamp->toDateTimeImmutable());
        } catch (\InvalidArgumentException) {
            $persistence->setUpdatedAt(null);
        }
    }

    private function mapReservedAt(Persistence\RecordMetadata $persistence, string $timestamp): void
    {
        $timestamp = new Timestamp($timestamp);

        try {
            $persistence->setReservedAt($timestamp->toDateTimeImmutable());
        } catch (\InvalidArgumentException) {
            $persistence->setReservedAt(null);
        }
    }

    public function toPersistenceAssigner(): Persistence\RecordAssigner
    {
        $persistence = new Persistence\RecordAssigner();

        $persistence->setOrgId($this->schema->assignerOrgId);
        $persistence->setOrgName($this->schema->assignerShortName);
        $persistence->setUserId($this->schema->requesterUserId);

        return $persistence;
    }
}
