<?php

declare(strict_types=1);

namespace App\Console\Output\Style\Table\CVE;

use App\Console\Output\Style\Table\Common\TableStyle;
use App\Persistence\Document\CVE\Record;

final readonly class MetadataTableStyle
{
    use TableStyle;

    public function __construct(
        private Record $record,
        private int $verbosity,
    ) {
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function id(): array
    {
        return $this->keyValue('id', $this->record->getId());
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function state(): array
    {
        return $this->keyValue('state', $this->record->getMetadata()?->getState()->name);
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function publishedAt(): array
    {
        return $this->keyValue('published_at', $this->record->getMetadata()?->getPublishedAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function reservedAt(): array
    {
        return $this->keyValue('reserved_at', $this->record->getMetadata()?->getReservedAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function updatedAt(): array
    {
        return $this->keyValue('updated_at', $this->record->getMetadata()?->getUpdatedAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function rejectedAt(): array
    {
        return $this->keyValue('rejected_at', $this->record->getMetadata()?->getRejectedAt()?->format('c'));
    }

    /**
     * @return array{
     *     0: string,
     *     1: string,
     * }[]
     */
    public function assigner(): array
    {
        return $this->keyValue('assigner', $this->record->getAssigner()?->getOrgName());
    }
}